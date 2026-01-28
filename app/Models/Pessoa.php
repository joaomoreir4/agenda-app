<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\PessoaFactory;

#[UseFactory(PessoaFactory::class)]

class Pessoa extends Model
{
    use HasFactory;
    protected $fillable = ['nome']; 

    public function registros(): HasMany
    {
        return $this->hasMany(Registro::class);
    }
}
