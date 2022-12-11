<?php

namespace App\Domain\Models;

class Example
{
    private \DateTimeImmutable $dateTime;
    private string $message;

    public function __construct()
    {
    }

    public function __set(string $name, mixed $value)
    {
        switch ($name) {
            case 'CREATED_AT':
                $this->dateTime = new \DateTimeImmutable($value);
                break;
            case 'MESSAGE':
                $this->message = $value;
                break;
        }
    }

    public function getDateTime(): \DateTimeImmutable
    {
        return $this->dateTime;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}