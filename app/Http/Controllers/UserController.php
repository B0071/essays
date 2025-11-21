<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getEssays(User $user){
        $results = $user->essays()->get();
        
        return view('results', [
            'results' => $results,
            'searchedWord' => $user->name
        ]);
    }

    public function ownEssays(){
        $results = Auth::user()->essays()->get();

        return view('results', [
            'results' => $results
        ]);
    }
}
