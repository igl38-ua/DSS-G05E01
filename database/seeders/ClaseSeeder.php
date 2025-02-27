<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clase')->insert([
            [
                'nombre' => 'Pilates',
                'descripcion' => 'Clase de Pilates para principiantes',
                'horario' => '09:00:00',
                'capacidad_max' => 20,
                'JAM' => 'Morning',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'CrossFit',
                'descripcion' => 'Entrenamiento de alta intensidad',
                'horario' => '18:00:00',
                'capacidad_max' => 15,
                'JAM' => 'Evening',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
