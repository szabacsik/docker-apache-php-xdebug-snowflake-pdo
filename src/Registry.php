<?php
declare(strict_types=1);

namespace App;

abstract class Registry
{
    private static array $services = [];

    public static function set(string $key, object $value): void
    {
        self::$services[$key] = $value;
    }

    public static function get(string $key): mixed
    {
        return self::$services[$key];
    }
}