<?php

use App\Http\Controllers\CryptoController;
use Tests\TestCase;

class CryptoTest extends TestCase
{
    public function test_encrypt()
    {
        $controller = new CryptoController;

        $original = 'Pasenos profe';

        $encrypted = $controller->encrypt($original);

        $this->assertNotEquals($original, $encrypted);
    }
}
