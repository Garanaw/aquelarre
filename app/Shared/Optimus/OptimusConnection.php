<?php

declare(strict_types=1);

namespace App\Shared\Optimus;

enum OptimusConnection: string
{
    case MAIN = 'main';
    case USER = 'user';
    case KINGDOM = 'kingdom';
    case BOOK = 'book';
}
