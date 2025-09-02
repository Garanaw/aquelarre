<?php

declare(strict_types=1);

namespace App\Books\Domain\Collection;

use App\Books\Infrastructure\Enum\BookType;
use App\Books\Infrastructure\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookCollection extends Collection
{
    public function getBookIdByName(string $name): int
    {
        $target = $this->first(fn (Book $book) => $book->name->is($name));

        return $target?->id ?? throw new \RuntimeException(message: "Book with name '{$name}' not found.");
    }

    public function bookByName(string $name): ?Book
    {
        return $this->first(static fn (Book $book) => $book->name->is($name));
    }

    public function aq3ed(): Book
    {
        return $this->bookByName(name: 'Aquelarre Tercera Edición');
    }

    public function daemonolatreia(): Book
    {
        return $this->bookByName(name: 'Daemonolatreia');
    }

    public function arsMalefica(): Book
    {
        return $this->bookByName('Ars Malefica');
    }

    public function decameron(): Book
    {
        return $this->bookByName('Decameron');
    }

    public function books(): static
    {
        return $this->filter(fn (Book $book) => $book->type->is(BookType::BOOK));
    }
}
