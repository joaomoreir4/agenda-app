<?php

namespace App\Livewire;

use App\Models\Pessoa;
use App\Models\Registro;
use App\Models\TipoRegistro;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CriarContatos extends Component
{
    public $showModal = false;

    
    public array $contatos = [];
    public $tipo = '';
    public $contato = '';

    public function addContato(){
        $this->contatos[] =
                [
                    'tipo' => $this->tipo, 
                    'contato' => $this->contato
                ];
    }

    public function deleteContato($index){
        unset($this->contatos[$index]);
        $this->contatos = array_values($this->contatos);
    }

    public function render()
        {
            $todos_tipos = TipoRegistro::orderBy('tipo_registro')->get();
            return view('livewire.criar-contatos', compact('todos_tipos'));
        }
    
    public function save()
        {
            // $pessoa = $this->validate();
            // Pessoa::create($pessoa);
            // $contato = $this->validate();
            // Registro::create($contato);
            // // $this->dispatch('contato-created'); 
        }

    public function removeContato($index)
    {
        unset($this->contatos[$index]);
        $this->contatos = array_values($this->contatos);
    }
}
