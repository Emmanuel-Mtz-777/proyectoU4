<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\DiscountService;

class DiscountServiceTest extends TestCase
{
    /**
     * Prueba que a los estudiantes se les aplique el 15% correctamente.
     */
    public function test_applies_student_discount_correctly()
    {
        // Preparación
        $service = new DiscountService();
        
        // Ejecución: 100 pesos - 15% debe ser 85
        $result = $service->applyDiscount(100, 'STUDENT');

        // Verificación
        $this->assertEquals(85.00, $result);
    }

    /**
     * Prueba que a un cliente VIP se le aplique el 20%.
     */
    public function test_applies_vip_discount_correctly()
    {
        $service = new DiscountService();
        
        // 200 pesos - 20% (40 pesos) = 160
        $result = $service->applyDiscount(200, 'VIP');

        $this->assertEquals(160.00, $result);
    }
    /*Prueba de que no se aceptan valores negativos*/
    public function test_returns_zero_for_negative_amounts()
    {
        $service = new DiscountService();
        $result = $service->applyDiscount(-50, 'NORMAL');

        $this->assertEquals(0.0, $result);
    }
}