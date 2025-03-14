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
    public function run()
    {
        $juan = Empleado::where('email', 'juan@example.com')->first();
        if ($juan) {
            $juan->fechas()->create([
                'dia'     => 1,
                'mes'     => 3,
                'anyo'    => 2023,
                'hora'    => 10,
                'minutos' => 30,
            ]);
        }

        $maria = Empleado::where('email', 'maria@example.com')->first();
        if ($maria) {
            $maria->fechas()->create([
                'dia'     => 2,
                'mes'     => 3,
                'anyo'    => 2023,
                'hora'    => 12,
                'minutos' => 15,
            ]);
        }
    }
}
