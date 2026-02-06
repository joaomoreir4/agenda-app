<?php

use App\Http\Controllers\ContatosController;
use App\Http\Controllers\TiposController;
use App\Mail\MyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::resource('tipos', TiposController::class);
    Route::resource('contatos', ContatosController::class);

    Route::get('/testroute', function(){
        $nome = "João";

        Mail::to('jpgdmr@gmail.com')->send(new MyEmail($nome));
    });
    
});
