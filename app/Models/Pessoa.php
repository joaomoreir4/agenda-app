<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Database\Factories\PessoaFactory;

#[UseFactory(PessoaFactory::class)]

class Pessoa extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'endereco', 'data_nasc']; 

    public function registros(): HasMany
    {
        return $this->hasMany(Registro::class);
    }

    protected function dataNasc(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value)->format('Y-m-d') : null,
        );
    }
}
