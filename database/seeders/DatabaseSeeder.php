<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            EmpleadoSeeder::class,
            // MonitorSeeder::class,
            EntrenadorPersonalSeeder::class,
            UsuarioSeeder::class,
            ClaseSeeder::class,
            FechaSeeder::class,
            // ReservaSeeder::class,
            SuscripcionesSeeder::class,
            // MetasSeeder::class,
        ]);
    }
}
