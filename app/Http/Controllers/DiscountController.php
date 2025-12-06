<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DiscountService; 

class DiscountController extends Controller
{
    protected $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0', 
            'type'   => 'required|string|in:vip,student,normal,VIP,STUDENT,NORMAL' 
        ]);

        $finalPrice = $this->discountService->applyDiscount(
            $validated['amount'], 
            $validated['type']
        );

        return response()->json([
            'success' => true,
            'data' => [
                'original_amount' => (float)$validated['amount'],
                'customer_type'   => strtoupper($validated['type']),
                'final_price'     => $finalPrice,
                'discount_applied'=> (float)$validated['amount'] - $finalPrice
            ],
            'message' => 'Cálculo realizado con éxito'
        ], 200);
    }
}