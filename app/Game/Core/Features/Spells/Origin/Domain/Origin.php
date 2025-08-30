<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Origin\Domain;

enum Origin: string
{
    case POPULAR = 'Magia Popular';
    case ALCHEMICAL = 'Magia Alquímica';
    case PAGAN = 'Magia Pagana';
    case INFERNAL = 'Magia Infernal';
    case FORBIDDEN = 'Magia Prohibida';
}
