<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
    //View Login form    
    return view('login');
    }

    public function store(Request $request)
    {
        //Validating email and password
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

       //Error message
        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors(['email' => 'Invalid credentials. Check the email address and password entered'])
                ->withInput();
        }

        $request->session()->regenerate();

        //Redirecting user
        return redirect('/dashboard')->with('success', 'Login successful');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out.');
    }
    
}
