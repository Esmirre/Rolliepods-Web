<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required'    => 'Enter your email.',
            'email.email'       => 'Enter a valid email.',
            'password.required' => 'Enter your password.',
        ]);

        // Auth uses User::getAuthPassword(), which reads the password_hash column.
        if (! Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return back()->withErrors(['email' => 'Wrong email or password.'])->onlyInput('email');
        }

        $request->session()->regenerate();

        return Auth::user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->intended(route('home'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
