<?php

namespace App\Services;

class DiscountService
{
    /**
     * Calcula el precio final aplicando un descuento según el tipo de cliente.
     *
     * @param float $amount El monto total de la compra.
     * @param string $customerType El tipo de cliente ('VIP', 'STUDENT', 'NORMAL').
     * @return float El precio final redondeado a 2 decimales.
     */
    public function applyDiscount(float $amount, string $customerType): float
    {
        //Validación
        if ($amount < 0) {
            return 0.0;
        }

        $discountPercentage = 0;

        switch (strtoupper($customerType)) {
            case 'VIP':
                $discountPercentage = 0.20; 
                break;
            case 'STUDENT':
                $discountPercentage = 0.15; 
                break;
            default:
                $discountPercentage = 0; 
        }

        //Cálculo
        $discountAmount = $amount * $discountPercentage;
        $finalPrice = $amount - $discountAmount;

        return round($finalPrice, 2);
    }
}