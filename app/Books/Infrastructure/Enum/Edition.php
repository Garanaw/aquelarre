<?php

declare(strict_types=1);

namespace App\Books\Infrastructure\Enum;

enum Edition: int
{
    case FIRST = 1;
    case SECOND = 2;
    case THIRD = 3;

    public function label(): string
    {
        return match ($this) {
            self::FIRST => 'First Edition',
            self::SECOND => 'Second Edition',
            self::THIRD => 'Third Edition',
        };
    }
}
