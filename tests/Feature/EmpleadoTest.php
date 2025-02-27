<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmpleadoTest extends TestCase
{
    use RefreshDatabase; // limpia la base de datos cada vez que se ejecuta el test

    /** @test */
    public function create_empleado()
    {
        $response = $this->post('/empleados', [
            'nombre' => 'Test Empleado',
            'email' => 'test@example.com',
            'direccion' => 'Calle Test 123',
            'horarioTrabajo' => '08:00-16:00',
            'nomina' => 1200.00,
        ]);
        
        $response->assertStatus(201);
        
        $this->assertDatabaseHas('empleado', [
            'nombre' => 'Test Empleado',
            'email'  => 'test@example.com',
        ]);
    }
}
