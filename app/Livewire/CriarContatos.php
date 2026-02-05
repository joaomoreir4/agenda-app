<?php

namespace App\Livewire;

use App\Models\Pessoa;
use App\Models\Registro;
use App\Models\TipoRegistro;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CriarContatos extends Component
{
    #[Validate('required', message: 'Informe um tipo de contato')]
    public $tipo_registro_id = '';

    #[Validate('required', message: 'Informe um contato')]
    public $contato = '';

    public array $contatos = [];

    public function addContato(){
        $validated = $this->validate([
            'tipo_registro_id' => 'required',
            'contato' => 'required'
        ]);

        $tipo_registro_nome = TipoRegistro::find($validated['tipo_registro_id']);
        $this->contatos[] =
                [
                    'tipo_registro_id' => $validated['tipo_registro_id'],
                    'tipo_registro' => $tipo_registro_nome->tipo_registro, 
                    'contato' => $validated['contato']
                ];
    }

    public function deleteContato($index){
        unset($this->contatos[$index]);
        $this->contatos = array_values($this->contatos);
    }

    public function render(){
            $todos_tipos = TipoRegistro::orderBy('tipo_registro')->get();
            return view('livewire.criar-contatos', compact('todos_tipos'));
    }
}
