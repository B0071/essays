<?php

namespace App\Http\Controllers;

use App\Models\Essay;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EssayController extends Controller
{
    public function index(){
        $essays = Essay::latest()->get();

        return view('essays.index', [
            'essays' => $essays
        ]);
    }

    public function show(Essay $essay){
        return view('essays.show', [
            'essay' => $essay
        ]);
    }

    public function create(){
        return view('essays.create');
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'title' => ['required', 'min:10'],
            'body' => ['required', 'min:50']
        ]);

        $essay = Auth::user()->essays()->create($attributes);

        return redirect("/essays/" . $essay->id);
    }

    public function edit(Essay $essay){
        
        return view('essays.edit', [
            'essay' => $essay
        ]);
    }

    public function update(Request $request, Essay $essay){
        
        $essay->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('/essays/' . $essay->id);

    }

    public function destroy(Essay $essay){
        if(Auth::user()->is($essay->user)){
            $essay->delete();
        }

        return redirect('/essays');
    }
}
