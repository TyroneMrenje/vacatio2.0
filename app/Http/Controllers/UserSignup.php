<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class UserSignup extends Controller
{
    //
    public function userSignup(Request $request){
        
        $credentials = $request->validate([
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required','email', 'unique:users,email'],
            'password' => ['required', 'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
                'confirmed'
            ],
        ]);

        $user = User::create([
            ...$credentials,
            'password'=>Hash::make($credentials['password'])
            
        ]);
        event(new Registered($user));

        Auth::login($user);   
        
        return redirect('/email/verify')->with('success', 'Welcome');
        
    }
}
