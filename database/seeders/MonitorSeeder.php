<?php

namespace Database\Seeders;

use App\Models\Empleado;
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
        // Monitor para Juan Pérez
        $empleadoJuan = Empleado::where('email', 'juan@example.com')->first();
        if ($empleadoJuan) {
            $empleadoJuan->monitor()->create([
                'especialidad' => 'Yoga',
            ]);
        }
        
        // Monitor para Carlos Ruiz
        $empleadoCarlos = Empleado::where('email', 'carlos@example.com')->first();
        if ($empleadoCarlos) {
            $empleadoCarlos->monitor()->create([
                'especialidad' => 'Spinning',
            ]);
        }
    }
}
