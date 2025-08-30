<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Spell\Domain\Enum;

enum Vis: int
{
    case PRIMA = 1;
    case SECUNDA = 2;
    case TERTIA = 3;
    case QUARTA = 4;
    case QUINTA = 5;
    case SEXTA = 6;
    case SEPTIMA = 7;

    public static function getIterable(): array
    {
        return self::cases();
    }
}
