<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Society\Domain\Enum;

enum SocietyName: string
{
    case CHRISTIAN = 'Cristiana';
    case JEWISH = 'Judía';
    case MUSLIM = 'Islámica';
    case PAGAN = 'Pagana';
}
