<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Domain\Enum;

enum Multiplier: int
{
    case ONE = 1;
    case TWO = 2;
    case THREE = 3;
    case FIVE = 5;
    case SEVEN = 7;
    case TEN = 10;
    case FIFTEEN = 15;
    case TWENTY = 20;
}
