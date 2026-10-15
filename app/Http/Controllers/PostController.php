<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // ----- Public -----
    public function home()
    {
        return view('pages.home', ['posts' => Post::published()->latest()->take(3)->get()]);
    }

    public function news()
    {
        return view('pages.news', ['posts' => Post::published()->latest()->get()]);
    }

    // ----- Admin CRUD -----
    public function adminIndex()
    {
        return view('admin.posts', ['posts' => Post::latest()->paginate(10)]);
    }

    private function rules(): array
    {
        return [
            'title'      => 'required|string|max:255',
            'content'    => 'required|string|max:5000',
            'card_color' => 'required|in:orange,blue,green',
            'is_published' => 'nullable|boolean',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['image'] = $request->hasFile('image') ? $request->file('image')->store('posts', 'public') : null;
        $data['is_published'] = $request->boolean('is_published');
        $data['author_id'] = $request->user()->user_id;

        Post::create($data);

        return redirect()->route('admin.posts')->with('success', 'Announcement posted successfully!');
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate($this->rules());
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        } else {
            unset($data['image']); // keep the current image
        }

        $post->update($data);

        return redirect()->route('admin.posts')->with('success', 'Announcement updated successfully!');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('admin.posts')->with('success', 'Announcement deleted.');
    }
}
