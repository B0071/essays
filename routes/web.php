<?php

use App\Http\Controllers\EssayController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
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
Route::get('/essays/{essay}/edit', [EssayController::class, 'edit'])->can('edit-essay', 'essay');
Route::put('/essays/{essay}', [EssayController::class, 'update']);
Route::delete('/essays/{essay}', [EssayController::class, 'destroy'])->can('edit-essay', 'essay');

Route::middleware('guest')->group(function(){
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});
Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('/results', SearchController::class);
Route::get('/users/{user}/essays', [UserController::class, 'getEssays']);