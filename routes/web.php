<?php

use App\Http\Controllers\EssayController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', function(){
    return view('index');
});

Route::get('/essays', [EssayController::class, 'index']);
Route::get('/essays/create', [EssayController::class, 'create']);
Route::post('/essays', [EssayController::class, 'store']);
Route::get('/essays/{essay}', [EssayController::class, 'show']);

Route::middleware('guest')->group(function(){
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');