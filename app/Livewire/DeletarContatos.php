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
        $this->dispatch('contato-deletado');
    }

    public function render()
    {
        return view('livewire.deletar-contatos');
    }
}
