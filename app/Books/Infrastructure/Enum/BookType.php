<?php

declare(strict_types=1);

namespace App\Books\Infrastructure\Enum;

enum BookType: string
{
    case BOOK = 'book';
    case MAGAZINE = 'magazine';
    case COMIC = 'comic';
}
