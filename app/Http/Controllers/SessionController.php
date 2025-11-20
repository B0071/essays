<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    // to show login page
    public function create(){
        return view('auth.login');
    }

    // to login
    public function store(Request $request){

        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6)]
        ]);

        $user = Auth::attempt($attributes);

        if (! $user){
            throw ValidationException::withMessages([
                'email' => 'No matching account found for the credentials'
            ]);
        }

        $request->session()->regenerate();

        return redirect('/');
    }

    // to log out
    public function destroy(){
        Auth::logout();

        return redirect('/');
    }
}
