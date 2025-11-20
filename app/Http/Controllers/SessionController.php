<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    // to show login page
    public function create(){}

    // to login
    public function store(){}

    // to log out
    public function destroy(){
        Auth::logout();

        return redirect('/');
    }
}
