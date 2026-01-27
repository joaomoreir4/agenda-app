<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\RegistroFactory;

#[UseFactory(RegistroFactory::class)]

class Registro extends Model
{
    use HasFactory;

    protected $fillable = ['contato', 'pessoa_id', 'tipo_registro_id'];

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class);
    }
    
    public function tipoRegistro(): BelongsTo
    {
        return $this->belongsTo(TipoRegistro::class);
    }
}
