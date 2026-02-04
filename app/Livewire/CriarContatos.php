<?php

namespace App\Livewire;

use App\Models\Pessoa;
use App\Models\Registro;
use App\Models\TipoRegistro;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CriarContatos extends Component
{
    public $nome = '';

    public $endereco = '';

    public $data_nasc = '';

    public $tipo_registro_id = '';

    public $contato = '';

    public array $contatos = [];

    public function addContato(){
        $tipo_registro_nome = TipoRegistro::find($this->tipo_registro_id);
        $this->contatos[] =
                [
                    'tipo_registro_id' => $this->tipo_registro_id,
                    'tipo_registro' => $tipo_registro_nome->tipo_registro, 
                    'contato' => $this->contato
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
