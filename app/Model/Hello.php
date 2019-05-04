<?php
namespace App\Model;

class Hello implements HelloInterface
{
    public function withName(string $name): array
    {
        return [
            "en" => "Hello, $name",
            "ja" => "こんにちは, $name"
        ];
    }
}
