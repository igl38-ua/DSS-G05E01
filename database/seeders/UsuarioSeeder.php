<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    

        $usuarios = [
            ['admin', 'admin@example.com', '456123789', 'admin', '2024-03-01', 'admin'],
            ['Usuario1', 'usuario1@example.com', '123456789', 'password1', '2023-01-01', 'user'],
            ['Usuario2', 'usuario2@example.com', '987654321', 'password2', '2023-02-01' , 'user'],
            ['Usuario3', 'usuario3@example.com', '555123456', 'password3', '2023-03-15' , 'user'],
            ['Usuario4', 'usuario4@example.com', '444987654', 'password4', '2023-04-10' , 'user'],
            ['Usuario5',  'usuario5@example.com',  '321654987', 'password5',  '2023-05-01' , 'user'],
            ['Usuario6',  'usuario6@example.com',  '789456123', 'password6',  '2023-05-15' , 'user'],
            ['Usuario7',  'usuario7@example.com',  '654789321', 'password7',  '2023-06-10' , 'user'],
            ['Usuario8',  'usuario8@example.com',  '147258369', 'password8',  '2023-06-20' , 'user'],
            ['Usuario9',  'usuario9@example.com',  '963852741', 'password9',  '2023-07-01' , 'user'],
            ['Usuario10', 'usuario10@example.com', '159357486', 'password10', '2023-07-05' , 'user'],
            ['Usuario11', 'usuario11@example.com', '753159842', 'password11', '2023-07-10' , 'user'],
            ['Usuario12', 'usuario12@example.com', '852963741', 'password12', '2023-07-15' , 'user'],
            ['Usuario13', 'usuario13@example.com', '741852963', 'password13', '2023-08-01' , 'user'],
            ['Usuario14', 'usuario14@example.com', '369258147', 'password14', '2023-08-12' , 'user'],
            ['Usuario15', 'usuario15@example.com', '654321987', 'password15', '2023-08-20' , 'user'],
        ];

        foreach ($usuarios as $user) {
            \App\Models\Usuario::create([
                'nombre'            => $user[0],
                'email'             => $user[1],
                'telefono'          => $user[2],
                'password'          => Hash::make($user[3]),
                'fecha_inscripcion' => $user[4],
                'rol'               => $user[5],
            ]);
        }
    }

}
