<?php

declare(strict_types=1);

namespace App\Books\Infrastructure\Enum;

use App\Shared\Support\Enum\Concerns\ChecksAgainstSelf;

enum BookType: string
{
    use ChecksAgainstSelf;

    case BOOK = 'book';
    case MAGAZINE = 'magazine';
    case COMIC = 'comic';
}
