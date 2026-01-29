<?php

namespace App\Livewire;

use App\Models\Pessoa;
use App\Models\Registro;
use Livewire\Component;

class ListaContatos extends Component
{
    public $search = '';

    public function render()
    {
        $pessoas = Pessoa::where("nome", "LIKE", "%" . $this->search . "%")
            ->with('registros.tipoRegistro')
            ->orderBy('nome')
            ->get();
        return view('livewire.lista-contatos', ['pessoas' => $pessoas]);
    }
}
