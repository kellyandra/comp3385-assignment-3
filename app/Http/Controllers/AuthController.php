<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    //


public function create()
{
    return view('login');
}

public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // Regenerate the session to prevent session fixation

        return redirect()->intended('dashboard')->with('success', 'Login successful'); // Use intended to redirect to the URL user tried to access before
    } else {
        return back()->withErrors(['email' => 'Invalid credentials. Check the email address and password entered'])->onlyInput('email');
    }
}

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'You have been logged out.');
}
}