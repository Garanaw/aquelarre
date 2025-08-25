<?php

declare(strict_types=1);

namespace App\Books\Infrastructure\Reader;

use App\Books\Domain\Collection\BookCollection;
use App\Books\Infrastructure\Models\Book;

class Reader
{
    public function __construct(
        private readonly Book $book,
    ) {
    }

    public function all(): BookCollection
    {
        return $this->book->all();
    }
}
