<?php

namespace App\Http\Controllers;

class conversionController extends Controller
{

    public function cToF($c)
    {
        return ($c * 9/5) + 32;
    }

    public function mbToGb($mb)
    {
        return $mb / 1024;
    }

}
