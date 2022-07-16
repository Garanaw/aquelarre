<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Society;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class SocietyLoader implements Loader
{
    private ?Collection $societies = null;

    public function __construct(
        private readonly DatabaseManager $db,
        private readonly Repository $cache
    ) {
    }

    public function load(): Collection
    {
        return $this->societies = $this->cache->remember(
            key: 'seed-societies',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table(table: 'societies')
                ->select('id', 'name')
                ->get()
                ->mapWithKeys(callback: static fn (object $society) => [
                    Str::slug($society->name) => $society->id,
                ])
        );
    }

    public function getSocietyIdByName(string $name): int
    {
        return $this->societies->get(
            key: Str::slug(title: $name),
        );
    }

    public function christian(): int
    {
        return $this->getSocietyIdByName(name: 'cristiana');
    }

    public function judaic(): int
    {
        return $this->getSocietyIdByName(name: 'judía');
    }

    public function muslim(): int
    {
        return $this->getSocietyIdByName(name: 'islámica');
    }
}
