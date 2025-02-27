<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuario')->insert([
            [
                'nombre' => 'Usuario1',
                'email' => 'usuario1@example.com',
                'telefono' => '123456789',
                'contrasena' => bcrypt('password1'),
                'fecha_inscripcion' => '2023-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Usuario2',
                'email' => 'usuario2@example.com',
                'telefono' => '987654321',
                'contrasena' => bcrypt('password2'),
                'fecha_inscripcion' => '2023-02-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
