<?php

declare(strict_types=1);

namespace Aquelarre\Core\Books\Infrastructure\Repositories;

use Aquelarre\Core\Books\Infrastructure\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Reader
{
    public function __construct(
        private readonly Book $book
    ) {
    }

    public function find(string $id): Book | Model
    {
        return $this->book->query()->firstOrFail($id);
    }

    public function getAq3Ed(): Book | Model
    {
        return $this->book->query()
            ->where(column: 'name', operator: '=', value: 'Aquelarre Tercera Edición')
            ->where(column: 'edition', operator: '=', value: 3)
            ->where(column: 'editorial', operator: '=', value: 'NoSoloRol')
            ->first();
    }

    public function getAll(): Collection
    {
        return $this->book->query()->get();
    }
}
