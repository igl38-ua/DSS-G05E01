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
            ['admin', 'admin@example.com', '456123789', 'admin', '2024-03-01', 'admin', '4111111111111111'],
            ['Usuario1', 'usuario1@example.com', '123456789', '1234', '2023-01-01', 'user', '5500000000000004'],
            ['Usuario2', 'usuario2@example.com', '987654321', 'password2', '2023-02-01' , 'user', '340000000000009'],
            ['Usuario3', 'usuario3@example.com', '555123456', 'password3', '2023-03-15' , 'user', '30000000000004'],
            ['Usuario4', 'usuario4@example.com', '444987654', 'password4', '2023-04-10' , 'user', '6011000000000004'],
            ['Usuario5',  'usuario5@example.com',  '321654987', 'password5',  '2023-05-01' , 'user', '201400000000009'],
            ['Usuario6',  'usuario6@example.com',  '789456123', 'password6',  '2023-05-15' , 'user', '36227206271667'],
            ['Usuario7',  'usuario7@example.com',  '654789321', 'password7',  '2023-06-10' , 'user', '3566002020360505'],
            ['Usuario8',  'usuario8@example.com',  '147258369', 'password8',  '2023-06-20' , 'user', '6304000000000000'],
            ['Usuario9',  'usuario9@example.com',  '963852741', 'password9',  '2023-07-01' , 'user', '6759649826438453'],
            ['Usuario10', 'usuario10@example.com', '159357486', 'password10', '2023-07-05' , 'user', '5018000000000009'],
            ['Usuario11', 'usuario11@example.com', '753159842', 'password11', '2023-07-10' , 'user', '5895620000000013'],
            ['Usuario12', 'usuario12@example.com', '852963741', 'password12', '2023-07-15' , 'user', '6304930000000000'],
            ['Usuario13', 'usuario13@example.com', '741852963', 'password13', '2023-08-01' , 'user', '4903010000000009'],
            ['Usuario14', 'usuario14@example.com', '369258147', 'password14', '2023-08-12' , 'user', '4024007149091730'],
            ['Usuario15', 'usuario15@example.com', '654321987', 'password15', '2023-08-20' , 'user', '4175001000000004'],
        ];


        foreach ($usuarios as $user) {
            \App\Models\Usuario::create([
                'nombre'            => $user[0],
                'email'             => $user[1],
                'telefono'          => $user[2],
                'password'          => Hash::make($user[3]),
                'fecha_inscripcion' => $user[4],
                'rol'               => $user[5],
                'payment_method'    => null,
                'suscripcion_id'    => null,
            ]);
        }
    }

}
