<?php

namespace App\Http\Controllers;

use App\Models\Essay;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $searchedWord = trim($request->input('q'));

        $searchTerm = "%{$searchedWord}%";

        if ($searchTerm){
            $results = Essay::where('title', 'like', $searchTerm);
        } else {
            $results = [];
        }

        $results = $results->latest()->get();

        return view('results', [
            'results' => $results,
            'searchedWord' => $searchedWord
        ]);
    }
}
