<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function show(Request $request)
    {
        if (! $request->user()) {
            session(['url.intended' => route('contact')]); // come back here after login
        }
        return view('pages.contact', ['types' => Inquiry::TYPES]);
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'inquiry_type' => ['required', Rule::in(array_keys(Inquiry::TYPES))],
            'subject'      => 'required|string|max:200',
            'message'      => 'required|string|max:3000',
        ], [
            'inquiry_type.required' => 'Please pick a message type.',
            'subject.required'      => 'Please add a subject.',
            'message.required'      => 'Please add some details.',
        ]);

        // Name and email come from the logged-in tenant's account.
        Inquiry::create($data + ['tenant_id' => $request->user()->user_id]);

        return back()->with('success', "Message sent! We'll get back to you soon.");
    }
}
