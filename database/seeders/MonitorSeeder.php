<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('monitor')->insert([
            [
                'id' => 1,  // que coincida con un empleado existente
                'especialidad' => 'Yoga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
