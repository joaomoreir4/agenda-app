<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use App\Models\Registro;
use App\Models\TipoRegistro;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tipoCelular = TipoRegistro::factory()->create(['tipo_registro' => 'Celular']);
        $tipoEmail   = TipoRegistro::factory()->create(['tipo_registro' => 'E-mail']);
        $tipoInsta   = TipoRegistro::factory()->create(['tipo_registro' => 'Instagram']);

        Pessoa::factory()
            ->count(15)
            ->afterCreating(function (Pessoa $pessoa) use ($tipoCelular, $tipoEmail, $tipoInsta) 
            {
                Registro::factory()->create(
                [
                    'contato' => fake()->phoneNumber(),
                    'pessoa_id' => $pessoa->id,
                    'tipo_registro_id' => $tipoCelular->id
                ]);

                Registro::factory()->create(
                [
                    'contato' => fake()->unique()->safeEmail(),
                    'pessoa_id' => $pessoa->id,
                    'tipo_registro_id' => $tipoEmail->id
                ]);

                Registro::factory()->create(
                [
                    'contato' => '@' . fake()->userName(),
                    'pessoa_id' => $pessoa->id,
                    'tipo_registro_id' => $tipoInsta->id
                ]);
            })
            ->create();
    }
}
