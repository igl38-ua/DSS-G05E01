<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;  // <--- aqu� estamos importando tu modelo

class CategorySeeder extends Seeder
{
    public function run()
    {
        $cats = [
            ['name'=>'General','slug'=>'general','description'=>'Temas generales no relacionados con el gimnasio','icon'=>'user'],
            ['name'=>'Rutinas','slug'=>'rutinas','description'=>'Apartado para pedir o compartir rutinas','icon'=>'adjustments'],
            ['name'=>'Clases','slug'=>'clases','description'=>'Preguntas sobre el funcionamiento o el horario de la clase','icon'=>'book-open'],
            ['name'=>'Entrenadores','slug'=>'entrenadores','description'=>'Hablar con los entrenadores o reservar horario con ellos','icon'=>'users'],
            ['name'=>'Consejos','slug'=>'consejos','description'=>'Consejos sobre como llevar el gimnasio, dentro y fuera de él','icon'=>'light-bulb'],
        ];

        foreach ($cats as $c) {
            Category::create($c);
        }
    }
}
