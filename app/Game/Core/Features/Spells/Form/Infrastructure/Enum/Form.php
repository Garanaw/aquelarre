<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Form\Infrastructure\Enum;

enum Form: string
{
    case SUMMON = 'Invocación';
    case POTION = 'Poción';
    case OINTMENT = 'Ungüento';
    case HEX = 'Maleficio';
    case TALISMAN = 'Talisman';
}
