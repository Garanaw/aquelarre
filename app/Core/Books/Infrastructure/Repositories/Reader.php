<?php

declare(strict_types=1);

namespace Aquelarre\Core\Books\Infrastructure\Repositories;

use Aquelarre\Core\Books\Domain\Dto\Search;
use Aquelarre\Core\Books\Domain\Dto\SearchResult;
use Aquelarre\Core\Books\Infrastructure\Models\Book;
use Aquelarre\Core\User\Infrastructure\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

readonly class Reader
{
    public function __construct(
        private Book $book
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

    public function allForUser(User $user): Collection
    {
        return $this->book->query()
            ->whereBelongsTo($user)
            ->get();
    }

    public function search(Search $search): SearchResult
    {
        return new SearchResult(
            books: new Collection(),
            search: $search
        );
    }
}
