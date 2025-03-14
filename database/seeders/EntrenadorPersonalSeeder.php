<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EntrenadorPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Entrenador para María López
        $empleadoMaria = Empleado::where('email', 'maria@example.com')->first();
        if ($empleadoMaria) {
            $empleadoMaria->entrenadorPersonal()->create([
                'suplemento_nomina' => 200.00,
            ]);
        }
        
        // Entrenador para Ana Martínez
        $empleadoAna = Empleado::where('email', 'ana@example.com')->first();
        if ($empleadoAna) {
            $empleadoAna->entrenadorPersonal()->create([
                'suplemento_nomina' => 250.00,
            ]);
        }
    }
}
