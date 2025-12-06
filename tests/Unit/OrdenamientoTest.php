<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\OrdenamientoController;

class OrdenamientoTest extends TestCase
{
    /**
     * Prueba si el controlador utiliza un algoritmo de ordenamiento simple (Bubble Sort) correctamente.
     * @return void
     */
    public function test_ordenamiento_burbuja_funciona_correctamente(): void
    {
        // ARRANGE: Inicializa la lista desordenada.
        $datosDesordenados = [5, 1, 4, 2, 8];
        $datosEsperados = [1, 2, 4, 5, 8];

        // ACT: Llama a la lógica de ordenamiento.
        // Simularemos el método estático o de servicio si no queremos instanciar el Controller.
        // Para este ejemplo, supondremos que hay un método 'aplicarOrdenamiento' en el controlador.
        $controller = new OrdenamientoController();
        $datosOrdenados = $controller->aplicarOrdenamiento($datosDesordenados);

        // ASSERT: Verifica que el resultado sea el esperado.
        $this->assertEquals($datosEsperados, $datosOrdenados);
    }
    
    /**
     * Prueba con una lista que ya está ordenada.
     */
    public function test_ordenamiento_lista_ya_ordenada(): void
    {
        $datos = [1, 2, 3, 4, 5];
        $controller = new OrdenamientoController();
        $datosOrdenados = $controller->aplicarOrdenamiento($datos);
        $this->assertEquals($datos, $datosOrdenados);
    }

    /**
     * Prueba con una lista vacía.
     */
    public function test_ordenamiento_lista_vacia(): void
    {
        $datos = [];
        $controller = new OrdenamientoController();
        $datosOrdenados = $controller->aplicarOrdenamiento($datos);
        $this->assertEquals([], $datosOrdenados);
    }
}