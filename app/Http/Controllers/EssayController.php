<?php

namespace App\Http\Controllers;

use App\Models\Essay;
use Illuminate\Http\Request;

class EssayController extends Controller
{
    public function index(){
        $essays = Essay::all();

        return view('index', [
            'essays' => $essays
        ]);
    }

    public function show(Essay $essay){
        return view('essay', [
            'essay' => $essay
        ]);
    }
}
