<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;

class CryptoController extends Controller
{
    public function encrypt(string $text): string
    {
        return Crypt::encryptString($text);
    }

    public function decrypt(string $encryptedText): string
    {
        return Crypt::decryptString($encryptedText);
    }

    public function base64Encrypt(string $text): string
    {
        return base64_encode($text);
    }

    public function base64Decrypt(string $encodedText): string
    {
        return base64_decode($encodedText);
    }
}
