<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Email;
use App\Models\Portfolio; 
use App\Models\ContactMe;  




class AuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = DB::table('credentials')->where('username', $request->input('username'))->first();

        if ($credentials && Hash::check($request->input('password'), $credentials->password)) {
            session(['authenticated' => true]);  // Store authentication status in session



            return redirect()->route('admin');
        }

        return redirect('/login/portfolio-admin')->with('error','Invalid username or password.Try Again.');
    }

    // Show dashboard
    public function showDashboard()
    {
        // Check if the user is authenticated using the session
        if (session('authenticated')) {
            // Fetch the project count and unread messages count
            $projectCount = Portfolio::count();  // Count the number of projects
            $unreadMessagesCount = ContactMe::where('read', false)->count();  // Count unread messages

            // Return the 'admin' view with the counts
            return view('admin', [
                'projectCount' => $projectCount,
                'unreadMessagesCount' => $unreadMessagesCount
            ]);
        }

        // If not authenticated, redirect to login page with an error message
        return redirect('/login/portfolio-admin')->with('error','You are not logged in');
    }

    // Logout
    public function logout()
    {
        // Clear session data
        session()->flush(); // Clears all session data
    
        // Clear the error message if it exists
        session()->forget('error'); 
    
        // Flash a success message to the session
        session()->flash('success', 'Logged out successfully.');
    
        // Redirect to the login page
        return redirect('/login/portfolio-admin');
    }
    
    

    // Show reset form
    public function showReset()
    {
        return view('auth.reset');
    }

    public function showUpdate(Request $request)
    {
        // Get the email from the session
        $email = $request->session()->get('email');

        // If there's no email in the session, redirect to the verification page
        if (!$email) {
            return redirect()->route('forgot-login')->withErrors(['error' => 'Please verify your email before accessing this page.']);
        }

        // Check if the email has a valid verification code
        $verification = DB::table('verification_codes')
            ->where('email', $email)
            ->where('expires_at', '>=', now())  // Ensure code is not expired
            ->first();

        if (!$verification) {
            return redirect()->route('verify-code')->withErrors(['error' => 'Please verify your email before accessing this page.']);
        }

        return view('reset');
    }


    // Handle reset credentials
    public function reset(Request $request)
    {
        // Validate inputs (no need to check if username is unique or valid since you are the only user)
        $request->validate([

            'new_username' => 'required|string', // New username (no unique check)
            'password' => 'required|string|min:6', // New password
        ], [
            'password.min' => 'The password must be at least 6 characters.',
        ]);

        // Update the user's credentials (both username and password)
        $updated = DB::table('credentials')
            ->update([
                'username' => $request->input('new_username'), // Update to new username
                'password' => Hash::make($request->input('password')), // Update password
                'updated_at' => now(),
            ]);

        // Handle the case where no user is found
        if (!$updated) {
            return redirect()->back()->withErrors(['username' => 'User not found.']);
        }

        // Clear sensitive session data
        session()->forget(['verified_code', 'authenticated']);

        // Redirect to login page with a success message
        return redirect('/login/portfolio-admin')->with('success', 'Credentials reset successfully. Please log in with your new credentials.');
    }


    public function showForgotForm()
    {
        return view('auth.forgot');
    }

    public function sendVerificationCode(Request $request)
    {
        // Validate the email
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->email;

        // Check if the email exists in the 'emails' table
        $emailExists = DB::table('emails')->where('email', $email)->exists();

        if (!$emailExists) {
            return back()->with('error', 'This email is not registered in our system.');
        }

        // Generate a 6-digit verification code
        $verificationCode = rand(100000, 999999);

        // Check if the email already exists in the 'verification_codes' table
        DB::table('verification_codes')->updateOrInsert(
            ['email' => $email], // Match by email
            [
                'code' => $verificationCode,         // New verification code
                'expires_at' => now()->addMinutes(2), // Set expiration to 10 minutes from now
            ]
        );

        // Send the verification code via email
        Mail::raw("Your verification code is: $verificationCode", function ($message) use ($email) {
            $message->to($email)
                ->subject('Verification Code');
        });

        return redirect()->route('verify-code')->with('success', 'Verification code sent to your email.');
    }



    public function showVerificationForm()
    {
        return view('auth.verify');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric',
        ]);

        // Check if the code exists and is valid
        $verification = DB::table('verification_codes')
            ->where('code', $request->code)
            ->where('expires_at', '>=', now()) // Ensure the code is not expired
            ->first();

        if (!$verification) {
            return back()->withErrors(['code' => 'Invalid or expired verification code.']);
        }
        // Store the session data after successful verification
        session(['verified_code' => true]);

        // Delete the verification code after successful verification
        DB::table('verification_codes')->where('code', $request->code)->delete();

        return redirect()->route('update')->with('success', 'Verification successful.');


    }

    public function showEmails()
    {
        // Fetch all emails
        $emails = Email::all();
        return view('auth.email', compact('emails'));
    }

    public function storeEmail(Request $request)
    {
        // Validate and add a new email
        $request->validate([
            'email' => 'required|email|unique:emails,email',
        ]);

        Email::create([
            'email' => $request->email,
        ]);

        return redirect()->route('auth.email')->with('success', 'Email added successfully.');
    }

    public function deleteEmail($id)
    {
        // Delete an email by ID
        $email = Email::findOrFail($id);
        $email->delete();

        return redirect()->route('auth.email')->with('success', 'Email deleted successfully.');
    }
}
