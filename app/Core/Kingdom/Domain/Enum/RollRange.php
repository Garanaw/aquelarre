<?php

declare(strict_types=1);

namespace Aquelarre\Core\Kingdom\Domain\Enum;

enum RollRange: int
{
    case MIN = 1;
    case MAX = 10;

    public static function isValid(int $roll): bool
    {
        return $roll >= self::MIN->value && $roll <= self::MAX->value;
    }
}
