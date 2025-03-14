<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Empleado::create([
            'nombre'         => 'Juan Pérez',
            'email'          => 'juan@example.com',
            'direccion'      => 'Calle Falsa 123',
            'horarioTrabajo' => '09:00-17:00',
            'nomina'         => 1500.00,
        ]);

        Empleado::create([
            'nombre'         => 'María López',
            'email'          => 'maria@example.com',
            'direccion'      => 'Avenida Real 456',
            'horarioTrabajo' => '10:00-18:00',
            'nomina'         => 1600.00,
        ]);
    }
}
