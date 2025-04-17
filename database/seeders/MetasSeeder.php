<?php
// database/seeders/MetasSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meta;
use Illuminate\Support\Carbon;

class MetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Meta::create([
            'ID_Usuario'  => 1,
            'anyo'        => Carbon::now()->year,
            'mes'         => Carbon::now()->month,
            'objetivo'    => 8,
            'descripcion' => 'Completar 8 clases este mes',
        ]);

        Meta::create([
            'ID_Usuario'  => 2,
            'anyo'        => Carbon::now()->year,
            'mes'         => Carbon::now()->month,
            'objetivo'    => 12,
            'descripcion' => 'Objetivo: 12 sesiones de entrenamiento',
        ]);

        Meta::create([
            'ID_Usuario'  => 3,
            'anyo'        => Carbon::now()->year,
            'mes'         => Carbon::now()->subMonth()->month,
            'objetivo'    => 6,
            'descripcion' => 'Meta pasado mes: 6 clases',
        ]);

        Meta::create([
            'ID_Usuario'  => 4,
            'anyo'        => Carbon::now()->year,
            'mes'         => Carbon::now()->month,
            'objetivo'    => 10,
            'descripcion' => null,
        ]);

        Meta::create([
            'ID_Usuario'  => 5,
            'anyo'        => Carbon::now()->year,
            'mes'         => Carbon::now()->subMonths(2)->month,
            'objetivo'    => 5,
            'descripcion' => 'Empieza el plan básico',
        ]);
    }
}
