<?php

namespace App\Livewire;

use App\Models\Pessoa;
use App\Models\Registro;
use Livewire\Component;
use App\Models\TipoRegistro;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class EditarContatos extends Component
{
    public Pessoa $pessoa;
    public Registro $registro;
    public $showModal = false;
    public $contatosDeletados = [];

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

    public function save(){
        // $pessoa = Pessoa::create($dados);
        // $dados["pessoa_id"] = $pessoa->id;

        foreach($dados["contatos"] as $dado){
                $dado["pessoa_id"] = $dados["pessoa_id"];
                Registro::create($dado);
            }

        foreach($this->contatosDeletados as $contatoId){
            $contato = Registro::find($contatoId);
            $contato->delete();
        }
        
        $this->showModal = false;
        $this->contatosDeletados = [];
        $this->dispatch('contato-criado');
    }

    public function addContato(){
        $tipo_registro_nome = TipoRegistro::find($this->tipo_registro_id);
        $this->contatos[] =
                [
                    'tipo_registro_id' => $this->tipo_registro_id,
                    'tipo_nome' => $tipo_registro_nome->tipo_registro, 
                    'contato' => $this->contato
                ];
    }

    public function deleteContato($index, $id){
        // Registro::find($id)->delete();
        // $this->dispatch('contato-deletado');
        
        unset($this->contatos[$index]);
        $this->contatos = array_values($this->contatos);

        $this->contatosDeletados[] = $id;
    }


    public function mount(Pessoa $pessoa, Registro $registro)
    {
        $this->pessoa = $pessoa;
        $this->registro = $registro;

        $this->nome = $pessoa->nome;
        $this->endereco = $pessoa->endereco;
        $this->data_nasc = $pessoa->data_nasc;
        $this->tipo_registro_id = $registro->tipo_registro_id;
        $this->contato = $registro->contato;

        // $this->contatos[] =
        //         [
        //             'tipo_registro_id' => $this->tipo_registro_id,
        //             'tipo_nome' => $tipo_registro_nome->tipo_registro, 
        //             'contato' => $this->contato
        //         ];

        $this->contatos = $this->pessoa->registros->map(function ($contatoDb) {
            $contato['id'] = $contatoDb->id;
            $contato['tipo_registro_id'] = $contatoDb->tipo_registro_id;
            $contato['tipo_nome'] = $contatoDb->tipoRegistro->tipo_registro;
            $contato['contato'] = $contatoDb->contato;
            return $contato;
        })->toArray();

        // dd($this->contatos);
    }
    
    #[On('contato-deletado')] 
    public function render()
    {
        $todos_tipos = TipoRegistro::orderBy('tipo_registro')->get();
        return view('livewire.editar-contatos', compact('todos_tipos'));
    }
}
