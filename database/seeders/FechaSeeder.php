<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Fecha;
use App\Models\Empleado;


class FechaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Fecha para Juan Pérez
        $empleado = Empleado::where('email', 'juan@example.com')->first();
        if ($empleado) {
            $empleado->fechas()->create([
                'dia'     => 1,
                'mes'     => 3,
                'anyo'    => 2023,
                'hora'    => 10,
                'minutos' => 30,
            ]);
        }

        // Fecha para María López
        $empleado = Empleado::where('email', 'maria@example.com')->first();
        if ($empleado) {
            $empleado->fechas()->create([
                'dia'     => 2,
                'mes'     => 3,
                'anyo'    => 2023,
                'hora'    => 12,
                'minutos' => 15,
            ]);
        }

        // Fecha para Carlos Ruiz
        $empleado = Empleado::where('email', 'carlos@example.com')->first();
        if ($empleado) {
            $empleado->fechas()->create([
                'dia'     => 3,
                'mes'     => 3,
                'anyo'    => 2023,
                'hora'    => 14,
                'minutos' => 0,
            ]);
        }

        // Fecha para Ana Martínez
        $empleado = Empleado::where('email', 'ana@example.com')->first();
        if ($empleado) {
            $empleado->fechas()->create([
                'dia'     => 4,
                'mes'     => 3,
                'anyo'    => 2023,
                'hora'    => 16,
                'minutos' => 45,
            ]);
        }

        // Fecha para Pedro Gómez
        $empleado = Empleado::where('email', 'pedro@example.com')->first();
        if ($empleado) {
            $empleado->fechas()->create([
                'dia'     => 5,
                'mes'     => 3,
                'anyo'    => 2023,
                'hora'    => 9,
                'minutos' => 15,
            ]);
        }

        // Fecha para Lucía Fernández
        $empleado = Empleado::where('email', 'lucia@example.com')->first();
        if ($empleado) {
            $empleado->fechas()->create([
                'dia'     => 6,
                'mes'     => 3,
                'anyo'    => 2023,
                'hora'    => 11,
                'minutos' => 30,
            ]);
        }
    }
}
