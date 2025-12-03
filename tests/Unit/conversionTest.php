<?php

namespace Tests\Unit;

use App\Http\Controllers\conversionController;
use Tests\TestCase;

class ConversionControllerTest extends TestCase
{
    public function test_celsius_to_fahrenheit()
    {
        $controller = new conversionController;

        $result = $controller->cToF(0); // 0°C = 32°F

        $this->assertEquals(32, $result);
    }

    public function test_megabytes_to_gigabytes()
    {
        $controller = new conversionController;

        $result = $controller->mbToGb(1024); // 1024 MB = 1 GB

        $this->assertEquals(1, $result);
    }
}
