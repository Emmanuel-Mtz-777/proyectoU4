<?php

namespace Tests\Unit;

use App\Http\Controllers\PasswordController;
use Tests\TestCase;

class PasswordControllerTest extends TestCase
{
    public function test_min_length()
    {
        $ctrl = new PasswordController;
        $this->assertTrue($ctrl->hasMinLength("Password123!"));
    }

    public function test_has_uppercase()
    {
        $ctrl = new PasswordController;
        $this->assertTrue($ctrl->hasUppercase("Hola123"));
    }

    public function test_has_lowercase()
    {
        $ctrl = new PasswordController;
        $this->assertTrue($ctrl->hasLowercase("HOLA123a"));
    }

    public function test_has_number()
    {
        $ctrl = new PasswordController;
        $this->assertTrue($ctrl->hasNumber("abc1"));
    }

    public function test_has_symbol()
    {
        $ctrl = new PasswordController;
        $this->assertTrue($ctrl->hasSymbol("Clave@2025"));
    }

    public function test_is_strong_password()
    {
        $ctrl = new PasswordController;
        $this->assertTrue($ctrl->isStrong("Fuerte@123"));
    }
}