<?php
namespace App\Model;

interface HelloInterface
{
    public function withName(string $name): string;
}
