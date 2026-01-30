<?php

namespace App\Livewire;

use App\Models\Pessoa;
use Livewire\Component;
use Livewire\Attributes\On; 

class ListaContatos extends Component
{
    public $showModal = false;
    public $search = '';

    #[On('contato-criado')]
    #[On('contato-deletado')]
    public function render()
    {
        $pessoas = Pessoa::where("nome", "LIKE", "%" . $this->search . "%")
            ->with('registros.tipoRegistro')
            ->orderBy('nome')
            ->get();
        return view('livewire.lista-contatos', ['pessoas' => $pessoas]);
    }
}
