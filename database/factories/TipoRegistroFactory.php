<?php

namespace Database\Factories;

use App\Models\TipoRegistro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoRegistro>
 */
class TipoRegistroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = TipoRegistro::class;

    public function definition(): array
    {
        return [
            'tipo_registro' => 'E-mail'
        ];
    }
}
