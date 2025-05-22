<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Suscripcion;

class SuscripcionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Suscripcion::create([
            'ID_Usuario'       => 1,
            'plan'             => 'Básico',
            'precio'           => 24.99,
            'fecha_inicio'     => Carbon::now()->startOfMonth()->toDateString(),
            'fecha_expiracion' => Carbon::now()->startOfMonth()->addMonth()->toDateString(),
        ]);

        Suscripcion::create([
            'ID_Usuario'       => 2,
            'plan'             => 'Dorado',
            'precio'           => 34.99,
            'fecha_inicio'     => Carbon::now()->subMonth()->startOfMonth()->toDateString(),
            'fecha_expiracion' => Carbon::now()->subMonth()->endOfMonth()->toDateString(),
        ]);

        Suscripcion::create([
            'ID_Usuario'       => 3,
            'plan'             => 'Platino',
            'precio'           => 44.99,
            'fecha_inicio'     => Carbon::now()->subMonths(2)->startOfMonth()->toDateString(),
            'fecha_expiracion' => Carbon::now()->subMonths(2)->endOfMonth()->toDateString(),
        ]);

        Suscripcion::create([
            'ID_Usuario'       => 4,
            'plan'             => 'Básico',
            'precio'           => 24.99,
            'fecha_inicio'     => Carbon::now()->subMonths(3)->startOfMonth()->toDateString(),
            'fecha_expiracion' => Carbon::now()->subMonths(3)->endOfMonth()->toDateString(),
        ]);

        Suscripcion::create([
            'ID_Usuario'       => 5,
            'plan'             => 'Dorado',
            'precio'           => 34.99,
            'fecha_inicio'     => Carbon::now()->subMonths(4)->startOfMonth()->toDateString(),
            'fecha_expiracion' => Carbon::now()->subMonths(4)->endOfMonth()->toDateString(),
        ]);
    }
}
