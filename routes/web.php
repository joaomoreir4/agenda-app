<?php

use App\Http\Controllers\ContatosController;
use App\Http\Controllers\TiposController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('tipos', TiposController::class);

    Route::resource('contatos', ContatosController::class);
    
});
