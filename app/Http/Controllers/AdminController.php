<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function dashboard()
    {
        $recent = Post::latest()->take(5)->get()
            ->map(fn ($p) => ['label' => 'Post: ' . $p->title, 'at' => $p->created_at])
            ->concat(Inquiry::with('tenant')->latest()->take(5)->get()
                ->map(fn ($q) => ['label' => (Inquiry::TYPES[$q->inquiry_type] ?? 'Inquiry') . ' from ' . ($q->tenant->full_name ?? 'a tenant'), 'at' => $q->created_at]))
            ->sortByDesc('at')->take(5);

        return view('admin.dashboard', [
            'postCount' => Post::count(),
            'pending'   => Inquiry::whereIn('status', ['pending', 'in_progress'])->count(),
            'resolved'  => Inquiry::whereIn('status', ['resolved', 'closed'])->count(),
            'recent'    => $recent,
        ]);
    }

    public function inquiries(Request $request)
    {
        $status = $request->query('status', 'all');

        $items = Inquiry::with('tenant')->latest()
            ->when(array_key_exists($status, Inquiry::STATUSES), fn ($q) => $q->where('status', $status))
            ->paginate(10)->withQueryString();

        return view('admin.inquiries', compact('items', 'status'));
    }

    public function updateInquiry(Request $request, Inquiry $inquiry)
    {
        $data = $request->validate([
            'status'         => ['required', Rule::in(array_keys(Inquiry::STATUSES))],
            'admin_response' => 'nullable|string|max:3000',
        ]);

        $inquiry->update([
            'status'         => $data['status'],
            'admin_response' => $data['admin_response'] ?? null,
            'resolved_at'    => $data['status'] === 'resolved' ? ($inquiry->resolved_at ?? now()) : null,
        ]);

        return back()->with('success', 'Inquiry updated.');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'password'         => 'required|string|min:8|confirmed',
        ], ['current_password.current_password' => 'Your current password is incorrect.']);

        $request->user()->update(['password_hash' => Hash::make($request->password)]);

        return back()->with('success', 'Password updated.');
    }
}
