<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Book;

use Aquelarre\Core\Books\Infrastructure\Models\Book;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class BookLoader implements Loader
{
    private ?Collection $books = null;

    public function __construct(
        private readonly DatabaseManager $db,
        private readonly Repository $cache
    ) {
    }

    public function load(): Collection
    {
        return $this->books = $this->cache->remember(
            key: 'books',
            ttl: 60,
            callback: fn(): Collection => $this->db->table('books')
                ->select('id', 'name')
                ->get()
                ->mapWithKeys(callback: static fn (Book $book) => [
                    Str::slug($book->name) => $book->getId(),
                ])
        );
    }

    public function getBookIdByName(string $name): int
    {
        return $this->books->get(
            key: Str::slug(title: $name),
        );
    }

    public function aq3ed(): int
    {
        return $this->getBookIdByName(name: 'Aquelarre Tercera Edición');
    }

    public function daemonolatreia(): int
    {
        return $this->getBookIdByName(name: 'Daemonolatreia');
    }
}
