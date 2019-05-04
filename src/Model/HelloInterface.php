<?php
namespace Sample\Model;

interface HelloInterface
{
    public function withName(string $name): string;
}
