<?php

declare(strict_types=1);

namespace App\Game\Core\Features\FamiliarSituation\Domain\Enum;

enum FamiliarSituation: string
{
    case DEAD = 'dead';
    case ALIVE = 'alive';
    case UNKNOWN = 'unknown';
    case MISSING = 'missing';
}
