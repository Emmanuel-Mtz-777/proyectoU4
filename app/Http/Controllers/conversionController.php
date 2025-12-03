<?php

namespace App\Http\Controllers;

class conversionController extends Controller
{
    public function cToF(float $c): float 
    {
        return ($c * 9 / 5) + 32;
    }

    public function mbToGb(float $mb): float
    {
        return $mb / 1024;
    }
}