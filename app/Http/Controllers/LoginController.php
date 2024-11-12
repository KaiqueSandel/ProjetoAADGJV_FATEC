<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function create(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users', 'email'],
            'password' => ['required', 'min:8', 'confirmed']
        ], [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'email.required' => 'E-mail is required.',
            'email.email' => 'E-mail is invalid.',
            'email.unique' => 'E-mail is already taken.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must have a minimum of :min characters!',
            'password.confirmed' => 'Passwords do not match.'
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.index')->with('success', 'Registered successfully!');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
