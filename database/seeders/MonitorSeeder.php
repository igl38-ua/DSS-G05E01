<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MonitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $empleado = Empleado::where('email', 'juan@example.com')->first();

        if ($empleado) {
            $empleado->monitor()->create([
                'especialidad' => 'Yoga',
            ]);
        }
    }
}
