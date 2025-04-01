<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Clase;

class ClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Clase::create([
            'nombre'        => 'Pilates',
            'descripcion'   => 'Clase de Pilates para principiantes',
            'horario'       => '09:00',
            'capacidad_max' => 20,
            'instructor'           => 'Lana Rhoades',
        ]);

        Clase::create([
            'nombre'        => 'CrossFit',
            'descripcion'   => 'Entrenamiento de alta intensidad',
            'horario'       => '18:00',
            'capacidad_max' => 15,
            'instructor'           => 'Juan',
        ]);

        Clase::create([
            'nombre'        => 'Zumba',
            'descripcion'   => 'Clase de baile para cardio y diversión',
            'horario'       => '11:00',
            'capacidad_max' => 25,
            'instructor'           => 'Esteban',
        ]);

        Clase::create([
            'nombre'        => 'Boxeo',
            'descripcion'   => 'Entrenamiento de boxeo para mejorar la resistencia',
            'horario'       => '17:00',
            'capacidad_max' => 10,
            'instructor'    => 'Levan',
        ]);
    }
}
