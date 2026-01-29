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

    #[Validate('required')] 
    public $nome = '';

    #[Validate('required')] 
    public $endereco = '';

    #[Validate('required')] 
    public $data_nasc = '';

    #[Validate('required')] 
    public $tipo_registro_id = '';

    #[Validate('required')] 
    public $contato = '';

    #[Validate('required')] 
    public array $contatos = [];

    public function addContato(){
        $this->contatos[] =
                [
                    'tipo' => $this->tipo_registro_id, 
                    'contato' => $this->contato
                ];
    }

    public function deleteContato($index){
        unset($this->contatos[$index]);
        $this->contatos = array_values($this->contatos);
    }

    public function save()
        {
            $dados = $this->validate();
            $pessoa = Pessoa::create($dados);
            $dados["pessoa_id"] = $pessoa->id;
            Registro::create($dados);
        }

    public function render(){
            $todos_tipos = TipoRegistro::orderBy('tipo_registro')->get();
            return view('livewire.criar-contatos', compact('todos_tipos'));
    }
}
