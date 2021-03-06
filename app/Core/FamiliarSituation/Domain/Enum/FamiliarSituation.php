<?php

declare(strict_types=1);

namespace Aquelarre\Core\FamiliarSituation\Domain\Enum;

enum FamiliarSituation: string
{
    case DEAD = 'dead';
    case ALIVE = 'alive';
    case UNKNOWN = 'unknown';
    case MISSING = 'missing';
}
