<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use App\Models\Fecha;
use App\Models\Clase;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $usuario1 = Usuario::where('email', 'usuario1@example.com')->first();
        $usuario2 = Usuario::where('email', 'usuario2@example.com')->first();
        $usuario3 = Usuario::where('email', 'usuario3@example.com')->first();
        $usuario4 = Usuario::where('email', 'usuario4@example.com')->first();

        $clasePilates  = Clase::where('nombre', 'Pilates')->first();
        $claseCrossFit = Clase::where('nombre', 'CrossFit')->first();
        $claseZumba    = Clase::where('nombre', 'Zumba')->first();
        $claseBoxeo    = Clase::where('nombre', 'Boxeo')->first();

        // Obtenemos las fechas asociadas a cada empleado a través de sus relaciones
        $fechaJuan   = Fecha::whereHas('empleado', function ($query) {
            $query->where('email', 'juan@example.com');
        })->first();

        $fechaMaria  = Fecha::whereHas('empleado', function ($query) {
            $query->where('email', 'maria@example.com');
        })->first();

        $fechaCarlos = Fecha::whereHas('empleado', function ($query) {
            $query->where('email', 'carlos@example.com');
        })->first();

        $fechaAna    = Fecha::whereHas('empleado', function ($query) {
            $query->where('email', 'ana@example.com');
        })->first();

        $fechaLucia  = Fecha::whereHas('empleado', function ($query) {
            $query->where('email', 'lucia@example.com');
        })->first();

        // Reserva para Usuario1: Pilates, fecha de Juan
        if ($usuario1 && $clasePilates && $fechaJuan) {
            $usuario1->reservas()->create([
                'ID_Clase' => $clasePilates->id,
                'ID_Fecha' => $fechaJuan->id,
            ]);
        }

        // Reserva para Usuario2: CrossFit, fecha de María
        if ($usuario2 && $claseCrossFit && $fechaMaria) {
            $usuario2->reservas()->create([
                'ID_Clase' => $claseCrossFit->id,
                'ID_Fecha' => $fechaMaria->id,
            ]);
        }

        // Reserva para Usuario3: Zumba, fecha de Carlos
        if ($usuario3 && $claseZumba && $fechaCarlos) {
            $usuario3->reservas()->create([
                'ID_Clase' => $claseZumba->id,
                'ID_Fecha' => $fechaCarlos->id,
            ]);
        }

        // Reserva para Usuario4: Boxeo, fecha de Ana
        if ($usuario4 && $claseBoxeo && $fechaAna) {
            $usuario4->reservas()->create([
                'ID_Clase' => $claseBoxeo->id,
                'ID_Fecha' => $fechaAna->id,
            ]);
        }
        
        // Reserva adicional: Usuario1 - Boxeo, fecha de Lucía
        if ($usuario1 && $claseBoxeo && $fechaLucia) {
            $usuario1->reservas()->create([
                'ID_Clase' => $claseBoxeo->id,
                'ID_Fecha' => $fechaLucia->id,
            ]);
        }
    }
}
