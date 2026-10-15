<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // -------------------------------------------------------------
    // PUBLIC VIEWS
    // -------------------------------------------------------------

    // Homepage (Shows top 3 latest posts)
    public function home()
    {
        $posts = Post::latest()->take(3)->get();
        return view('pages.home', compact('posts'));
    }

    // News Page (Shows all posts)
    public function news()
    {
        $posts = Post::latest()->get();
        return view('pages.news', compact('posts'));
    }

    // -------------------------------------------------------------
    // ADMIN CRUD OPERATIONS
    // -------------------------------------------------------------

    // Display Admin Posts Management Dashboard
    public function adminIndex()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts', compact('posts'));
    }

    // Store a New Announcement
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'content'    => 'required|string',
            'card_color' => 'required|in:orange,blue,green',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'title'      => $request->title,
            'content'    => $request->content,
            'card_color' => $request->card_color,
            'image'      => $imagePath,
        ]);

        return redirect()->route('admin.posts')->with('success', 'Announcement posted successfully!');
    }

    // Update Existing Announcement
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'content'    => 'required|string',
            'card_color' => 'required|in:orange,blue,green',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'title'      => $request->title,
            'content'    => $request->content,
            'card_color' => $request->card_color,
        ];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('admin.posts')->with('success', 'Announcement updated successfully!');
    }

    // Delete Announcement
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.posts')->with('success', 'Announcement deleted successfully!');
    }
}
