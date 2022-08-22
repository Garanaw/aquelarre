<?php

declare(strict_types=1);

namespace Aquelarre\Character\Domain\Enum;

enum CreationMethod: string
{
    case CLASSIC = 'classic';
    case FREE = 'free';
}
