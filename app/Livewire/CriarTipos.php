<?php

namespace App\Livewire;

use App\Models\TipoRegistro;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CriarTipos extends Component
{
    public $showModal = false;

    #[Validate('required')] 
    public $tipo_registro = '';

    public function save(){
        $tipo_registro = $this->validate();
        TipoRegistro::create($tipo_registro);
        
        $this->showModal = false;
    }

    public function render(){
        return view('livewire.criar-tipos');
    }
}
