<?php
namespace App\Interfaces\Api;

use Illuminate\Http\Request;

interface CustomerAuthInterface
{
    public function register(Request $req): array;
    public function login(array $credentials);

    public function logout(): void;

    public function resetPassword(array $data): void;

    // Add more methods as needed...
}


