<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Domain\Enum;

enum Operation: string
{
    case ADD = '+';
    case SUBTRACT = '-';
    case MULTIPLY = '*';
    case DIVIDE = '/';
    case GREATER_THAN = '>';
    case LESS_THAN = '<';
    case GREATER_WEAPON = '> weapon';
    case CURRENT_LANGUAGE = 'current language';
}
