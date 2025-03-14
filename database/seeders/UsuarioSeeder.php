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
    public function run()
    {
        Usuario::create([
            'nombre'            => 'Usuario1',
            'email'             => 'usuario1@example.com',
            'telefono'          => '123456789',
            'contrasena'        => Hash::make('password1'),
            'fecha_inscripcion' => '2023-01-01',
        ]);

        Usuario::create([
            'nombre'            => 'Usuario2',
            'email'             => 'usuario2@example.com',
            'telefono'          => '987654321',
            'contrasena'        => Hash::make('password2'),
            'fecha_inscripcion' => '2023-02-01',
        ]);
    }
}
