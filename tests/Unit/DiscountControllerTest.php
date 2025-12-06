<?php

namespace Tests\Feature;

use Tests\TestCase;

class DiscountControllerTest extends TestCase
{
    /**
     * Prueba que la ruta web responde y devuelve el JSON correcto.
     */
    public function test_route_works_and_returns_json()
    {
        // Simulamos enviar una petición POST a tu ruta definida en web.php
        // Nota: Laravel maneja el CSRF automáticamente en los tests, así que no fallará por eso aquí.
        $response = $this->post('/discount/calculate', [
            'amount' => 100,
            'type'   => 'STUDENT' // Debería dar 85
        ]);

        // Verificamos:
        // 1. Que el código HTTP sea 200 (OK)
        // 2. Que la estructura JSON sea la que definiste en el controlador
        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'data' => [
                         'final_price' => 85,
                         'customer_type' => 'STUDENT'
                     ]
                 ]);
    }

    /**
     * Prueba que las validaciones del controlador funcionan.
     */
    public function test_controller_validates_input()
    {
        // Enviamos datos vacíos para provocar error
        $response = $this->post('/discount/calculate', []);

        // Esperamos un error de redirección (302) porque las rutas web redirigen si fallan,
        // o un error 422 si Laravel detecta que pedimos JSON.
        // Para forzar que el test actúe como API, usamos postJson:
        $response = $this->postJson('/discount/calculate', []);
        
        $response->assertStatus(422) // 422 Unprocessable Entity
                 ->assertJsonValidationErrors(['amount', 'type']);
    }
}