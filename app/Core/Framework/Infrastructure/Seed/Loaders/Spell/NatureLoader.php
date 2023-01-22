<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Spell;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class NatureLoader implements Loader
{
    /** @var Collection<string, int>|null  */
    private ?Collection $natures = null;

    public function __construct(
        private readonly DatabaseManager $db,
        private readonly Repository $cache
    ) {
    }

    public function load(): Collection
    {
        return $this->natures = $this->cache->remember(
            key: 'seed-natures',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table('spell_natures')
                ->select('id', 'name')
                ->get()
                ->mapWithKeys(callback: static fn (object $nature) => [
                    Str::slug($nature->name) => $nature->id,
                ])
        );
    }

    public function getNatureIdByName(string $name): int
    {
        return $this->natures->get(
            key: Str::slug(title: $name),
        );
    }

    public function white(): int
    {
        return $this->getNatureIdByName(name: 'Magia Blanca');
    }

    public function black(): int
    {
        return $this->getNatureIdByName(name: 'Magia Negra');
    }
}
