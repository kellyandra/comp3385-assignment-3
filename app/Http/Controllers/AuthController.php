<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //


public function create(Request $request)
{
    return view('auth.create');
}



public function store(Request $request)
{
    $validated= $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
   if(Auth::attempt($validated)){
    return redirect('/dashboard')->with('success','Login Successful');
} else{
    return back()->withErrors(['email'=> 'Invalid credentials. Check the email address and password entered']);
}

}}