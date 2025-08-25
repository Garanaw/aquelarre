<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Characteristics\Domain\Enum;

use App\Shared\Support\Enum\Concerns\ChecksAgainstSelf;

enum Prefix: string
{
    use ChecksAgainstSelf;

    case ABILITY = 'HAB';
    case AGE = 'AGE';
    case AGILITY = 'AGI';
    case ASPECT = 'ASP';
    case COMMUNICATION = 'COM';
    case CULTURE = 'CUL';
    case HEIGHT = 'ALT';
    case INITIATIVE = 'INI';
    case IRRATIONALITY = 'IRR';
    case LUCK = 'SUE';
    case PERCEPTION = 'PER';
    case RATIONALITY = 'RR';
    case RESILIENCE = 'RES';
    case STRENGTH = 'FUE';
    case TEMPERANCE = 'TEM';
    case VITALITY = 'PV';
    case WEIGHT = 'PES';
}
