<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario1 = Usuario::where('email', 'usuario1@example.com')->first();
        $usuario2 = Usuario::where('email', 'usuario2@example.com')->first();

        $clasePilates = Clase::where('nombre', 'Pilates')->first();
        $claseCrossFit = Clase::where('nombre', 'CrossFit')->first();

        // Obtener las fechas previamente creadas
        $fechaJuan  = Fecha::where('dia', 1)->where('mes', 3)->where('anyo', 2023)->first();
        $fechaMaria = Fecha::where('dia', 2)->where('mes', 3)->where('anyo', 2023)->first();

        if ($usuario1 && $clasePilates && $fechaJuan) {
            $usuario1->reservas()->create([
                'ID_Clase' => $clasePilates->id,
                'ID_Fecha' => $fechaJuan->id,
            ]);
        }

        if ($usuario2 && $claseCrossFit && $fechaMaria) {
            $usuario2->reservas()->create([
                'ID_Clase' => $claseCrossFit->id,
                'ID_Fecha' => $fechaMaria->id,
            ]);
        }
    }
}
