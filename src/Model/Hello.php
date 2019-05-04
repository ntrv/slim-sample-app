<?php
namespace Sample\Model;

class Hello implements HelloInterface
{
    public function withName(string $name): string
    {
        return "Hello, $name";
    }
}
