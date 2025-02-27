<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reserva')->insert([
            [
                'ID_Usuario' => 1, 
                'ID_Clase' => 1,   
                'ID_Fecha' => 1,   
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ID_Usuario' => 2,
                'ID_Clase' => 2,
                'ID_Fecha' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
