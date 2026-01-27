<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\TipoRegistroFactory;

#[UseFactory(TipoRegistroFactory::class)]

class TipoRegistro extends Model
{
    use HasFactory;
    protected $fillable = ['tipo_registro']; 

    public function registros(): HasMany
    {
        return $this->hasMany(Registro::class);
    }
}
