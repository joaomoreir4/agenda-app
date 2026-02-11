<?php

namespace App\Livewire;

use App\Models\Pessoa;
use Livewire\Component;
use App\Models\TipoRegistro;
use Livewire\Attributes\On;

class ExibirContatos extends Component
{
    public Pessoa $pessoa;

    public $tipo_registro_id = '';

    public $contato = '';

    public array $contatos = [];
    
    public function addContato(){
        $tipo_registro_nome = TipoRegistro::find($this->tipo_registro_id);
        $this->contatos[] =
                [
                    'tipo_registro_id' => $this->tipo_registro_id,
                    'tipo_nome' => $tipo_registro_nome->tipo_registro, 
                    'contato' => $this->contato
                ];
    }

    public function mount()
    {
        $this->contatos = $this->pessoa->registros->map(function ($contatoDb) {
            $contato['id'] = $contatoDb->id;
            $contato['tipo_registro_id'] = $contatoDb->tipo_registro_id;
            $contato['tipo_nome'] = $contatoDb->tipoRegistro->tipo_registro;
            $contato['contato'] = $contatoDb->contato;
            return $contato;
        })->toArray();
    }
    
    #[On('contato-deletado')] 
    public function render()
    {
        $todos_tipos = TipoRegistro::orderBy('tipo_registro')->get();
        return view('livewire.exibir-contatos', compact('todos_tipos'));
    }
}
