<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Empleado;

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

        Empleado::create([
            'nombre'         => 'Carlos Ruiz',
            'email'          => 'carlos@example.com',
            'direccion'      => 'Calle 5 de Mayo 789',
            'horarioTrabajo' => '08:30-16:30',
            'nomina'         => 1550.00,
        ]);

        Empleado::create([
            'nombre'         => 'Ana Martínez',
            'email'          => 'ana@example.com',
            'direccion'      => 'Avenida Siempre Viva 101',
            'horarioTrabajo' => '09:30-17:30',
            'nomina'         => 1650.00,
        ]);

        Empleado::create([
            'nombre'         => 'Pedro Gómez',
            'email'          => 'pedro@example.com',
            'direccion'      => 'Callejón del Beso 202',
            'horarioTrabajo' => '07:00-15:00',
            'nomina'         => 1400.00,
        ]);

        Empleado::create([
            'nombre'         => 'Lucía Fernández',
            'email'          => 'lucia@example.com',
            'direccion'      => 'Plaza Mayor 303',
            'horarioTrabajo' => '11:00-19:00',
            'nomina'         => 1700.00,
        ]);
    }
}
