<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:100',
            'email'     => 'required|email|max:150|unique:users,email',
            'password'  => 'required|string|min:8',
        ], [
            'email.unique' => 'That email is already registered.',
            'password.min' => 'Use a password with at least 8 characters.',
        ]);

        // Everyone who signs up is a tenant.
        $user = User::create([
            'full_name'     => $data['full_name'],
            'email'         => $data['email'],
            'password_hash' => Hash::make($data['password']),
            'role'          => 'tenant',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }
}
