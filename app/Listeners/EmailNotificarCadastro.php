<?php

namespace App\Listeners;

use App\Events\PessoaCadastrada;
use App\Mail\PessoaCadastradaMail;
use Illuminate\Support\Facades\Mail;

class EmailNotificarCadastro
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PessoaCadastrada $event): void
    {
       Mail::to('teste@exemplo.com')->send(new PessoaCadastradaMail($event));
    }
}
