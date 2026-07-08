<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserLogin extends Controller
{
    //
   public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'email'    => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt($credentials, $request->boolean('remember'))) {
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    $request->session()->regenerate();

    return match(Auth::user()->role) {
        'manager'       => redirect('/manager/dashboard')->with('success', 'Welcome Back'),
        'cleanup_crew'  => redirect('/crew/dashboard')->with('success', 'Welcome Back'),
         default         => redirect('/')->with('success', 'Welcome Back'),
    };
}

}
