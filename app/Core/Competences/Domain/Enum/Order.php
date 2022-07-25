<?php

declare(strict_types=1);

namespace Aquelarre\Core\Competences\Domain\Enum;

enum Order: string
{
    case PRIMARY = 'primary';
    case SECONDARY = 'secondary';
}
