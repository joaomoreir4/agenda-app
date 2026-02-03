<?php

namespace App\Livewire;

use App\Models\Pessoa;
use App\Models\Registro;
use Livewire\Component;
use Livewire\Attributes\On; 

class ListaContatos extends Component
{
    public $showModal = false;
    public $search = '';

    #[On('contato-criado')]
    #[On('contato-deletado')]
    public function render(){

    }

    public function delete($id)
    {
        Registro::where('pessoa_id', $id)->delete();
        Pessoa::where('id', $id)->delete();
        
        $this->showModal = false;
        return view('contatos.create', compact('todos_tipos'));
    }
}
