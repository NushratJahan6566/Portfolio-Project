<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Process login form submission
    public function processLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Hardcoded credentials for simplicity
        if ($username === 'admin' && $password === 'secret') {
            session(['logged_in_user' => $username]);  // Store user in session
            return redirect()->route('admin');
        }

        return back()->with('error', 'Invalid credentials!');
    }

    // Logout user and clear session
    public function logout()
    {
        session()->forget('logged_in_user');
        return redirect()->route('login.form');
    }
}
