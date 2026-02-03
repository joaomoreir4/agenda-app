<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pessoa;
use App\Models\Registro;

class DeletarContatos extends Component
{
    public $showModal = false;
    public Pessoa $pessoa;

    public function delete($id)
    {
        Registro::where('pessoa_id', $id)->delete();
        Pessoa::where('id', $id)->delete();
        
        $this->showModal = false;
        return view('contatos.create', compact('todos_tipos'));
    }

    public function render()
    {
        return view('livewire.deletar-contatos');
    }
}
