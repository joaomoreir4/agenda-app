<?php

namespace App\Livewire;

use App\Models\Pessoa;
use Livewire\Component;
use App\Models\TipoRegistro;

class EditarContatos extends Component
{
    public Pessoa $pessoa;
    public $showModal = false;

    public function render()
    {
        $tipos = TipoRegistro::orderBy('tipo_registro')->get();
        return view('livewire.editar-contatos', compact('tipos'));
    }
}
