<?php

namespace App\Livewire;

use App\Models\Pessoa;
use App\Models\Registro;
use Livewire\Component;

class ListaContatos extends Component
{
    public function deletarContato($id)
    {
        Registro::where('pessoa_id', $id)->delete();
        Pessoa::where('id', $id)->delete();
    }

    public function render()
    {
        $pessoas = Pessoa::with('registros.tipoRegistro')->get();
        return view('livewire.lista-contatos', ['pessoas' => $pessoas]);
    }
}
