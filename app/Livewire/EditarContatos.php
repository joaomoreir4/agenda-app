<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TipoRegistro;

class EditarContatos extends Component
{
    public $showModal = false;

    public function render()
    {
        $tipos = TipoRegistro::orderBy('tipo_registro')->get();
        return view('livewire.editar-contatos', compact('tipos'));
    }
}
