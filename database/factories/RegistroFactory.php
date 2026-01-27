<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\Registro;
use App\Models\TipoRegistro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registro>
 */
class RegistroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Registro::class;

    public function definition(): array
    {
        return [
            'contato' => fake()->safeEmail(), 
            'pessoa_id' => Pessoa::factory(),
            'tipo_registro_id' => TipoRegistro::factory(),
        ];
    }
}
