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
    public $nome = "";

    #[Validate('required')] 
    public $endereco = "";

    #[Validate('required')] 
    public $aniversario = null;

    #[Validate('required')] 
    public $tipo_registro = null;

    #[Validate('required')] 
    public $contato = "";

    public function render()
        {
            $tipos = TipoRegistro::orderBy('tipo_registro')->get();
            return view('livewire.criar-contatos', compact('tipos'));
        }
    
    public function save()
        {
            $pessoa = $this->validate();
            Pessoa::create($pessoa);
            $contato = $this->validate();
            Registro::create($contato);
            // $this->dispatch('contato-created'); 
        }
 
 
    // public function save()
    // {
    //     // $pessoa = Pessoa::create(
    //     //     [
    //     //         'nome' => $this->nome,
    //     //     ]);
        
    //     // Registro::create(
    //     //     [
    //     //         'contato' => $this->contato,
    //     //         'pessoa_id' => $pessoa->id,
    //     //         'tipo_registro_id' => $this->tipo_contato
    //     //     ]);
    //     $this->showModal = false;

    // }
}
