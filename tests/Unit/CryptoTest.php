<?php

use App\Http\Controllers\CryptoController;
use Tests\TestCase;

test('that true is true', function () {
    expect(true)->toBeTrue();
});

class CryptoTestUnit extends TestCase
{
    public function test_encrypt()
    {
        $controller = new CryptoController;

        $encoded = $controller->base64Encrypt('Pasenos profe');
        $decoded = $controller->base64Decrypt($encoded);

        $this->assertEquals('Pasenos profe', $decoded);
    }
}
