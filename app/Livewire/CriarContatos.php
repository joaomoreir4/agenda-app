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
    public $salvo = FALSE;
    public $aux_contato = 0;
    
    public $tipos = [];
    public $contatos = [''];


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
 
 
    public function addContato()
    {
        $this->contatos[] = '';
    }

    public function removeContato($index)
    {
        unset($this->contatos[$index]);
        $this->contatos = array_values($this->contatos);
    }
}
