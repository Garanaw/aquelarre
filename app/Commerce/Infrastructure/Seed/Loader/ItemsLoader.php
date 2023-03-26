<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Infrastructure\Seed\Loader;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class ItemsLoader implements Loader
{
    /** @var Collection<string, int>|null */
    private ?Collection $items;

    public function __construct(
        private readonly DatabaseManager $db,
        private readonly Repository $cache
    ) {
    }

    public function load(): Collection
    {
        return $this->items = $this->cache->remember(
            key: 'seed-items',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table('items')
                ->select('id', 'name')
                ->get()
                ->mapWithKeys(callback: static fn (object $book) => [
                    Str::slug($book->name) => $book->id,
                ])
        );
    }

    public function getIdByName(string $name): int
    {
        return $this->items->get(
            key: Str::slug(title: $name),
        );
    }
}
