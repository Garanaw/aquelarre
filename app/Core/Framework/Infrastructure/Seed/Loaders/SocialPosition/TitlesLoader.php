<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class TitlesLoader implements Loader
{
    private ?Collection $titles = null;

    public function __construct(
        private readonly DatabaseManager $db,
        private readonly Repository $cache
    ) {
    }

    public function load(): Collection
    {
        return $this->titles = $this->cache->remember(
            key: 'seed-titles',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table(table: 'titles', as: 't')
                ->select(columns: [
                    't.id',
                    't.name',
                ])
                ->get()
                ->mapWithKeys(callback: static fn (object $title) => [
                    Str::slug(title: $title->name, separator: '_') => $title->id,
                ])
        );
    }

    public function get(string $name): int
    {
        return $this->titles->get(key: Str::slug(title: $name, separator: '_'));
    }
}
