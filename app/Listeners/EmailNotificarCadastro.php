<?php

namespace App\Listeners;

use App\Events\PessoaCadastrada;
use App\Mail\PessoaCadastradaMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Routing\Route;

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
        // dd($event->pessoa->nome);
       Mail::to('teste@exemplo.com')->send(new PessoaCadastradaMail($event->pessoa->nome));
    }
}
