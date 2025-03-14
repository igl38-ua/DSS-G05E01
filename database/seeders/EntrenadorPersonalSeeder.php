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
        $empleado = Empleado::where('email', 'maria@example.com')->first();

        if ($empleado) {
            $empleado->entrenadorPersonal()->create([
                'suplemento_nomina' => 200.00,
            ]);
        }
    }
}
