<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FechaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fecha')->insert([
            [
                'dia' => 1,
                'mes' => 3,
                'anyo' => 2023,
                'hora' => 10,
                'minutos' => 30,
                'ID_Empleado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dia' => 2,
                'mes' => 3,
                'anyo' => 2023,
                'hora' => 12,
                'minutos' => 15,
                'ID_Empleado' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
