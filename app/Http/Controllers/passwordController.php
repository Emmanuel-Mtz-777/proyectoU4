<?php

namespace App\Http\Controllers;

class PasswordController
{
    public function hasMinLength(string $password, int $length = 8): bool
    {
        return strlen($password) >= $length;
    }

    public function hasUppercase(string $password): bool
    {
        return (bool) preg_match('/[A-Z]/', $password);
    }

    public function hasLowercase(string $password): bool
    {
        return (bool) preg_match('/[a-z]/', $password);
    }

    public function hasNumber(string $password): bool
    {
        return (bool) preg_match('/[0-9]/', $password);
    }

    public function hasSymbol(string $password): bool
    {
        return (bool) preg_match('/[\W_]/', $password);
    }

    public function isStrong(string $password): bool
    {
        return $this->hasMinLength($password)
            && $this->hasUppercase($password)
            && $this->hasLowercase($password)
            && $this->hasNumber($password)
            && $this->hasSymbol($password);
    }
}
