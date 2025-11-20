<?php

use App\Http\Controllers\EssayController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [EssayController::class, 'index']);
Route::get('/essays/{essay}', [EssayController::class, 'show']);

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);