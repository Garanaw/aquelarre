<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Spell;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class OriginLoader implements Loader
{
    /** @var Collection<string, int>|null  */
    private ?Collection $origins = null;

    public function __construct(
        private readonly DatabaseManager $db,
        private readonly Repository $cache
    ) {
    }

    public function load(): Collection
    {
        return $this->origins = $this->cache->remember(
            key: 'seed-origins',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table('spell_origins')
                ->select('id', 'name')
                ->get()
                ->mapWithKeys(callback: static fn (object $origin) => [
                    Str::slug($origin->name) => $origin->id,
                ])
        );
    }

    public function getOriginIdByName(string $name): int
    {
        return $this->origins->get(
            key: Str::slug(title: $name),
        );
    }

    public function popular(): int
    {
        return $this->getOriginIdByName(name: 'Magia Popular');
    }

    public function alchemical(): int
    {
        return $this->getOriginIdByName(name: 'Magia Alquímica');
    }

    public function pagan(): int
    {
        return $this->getOriginIdByName(name: 'Magia Pagana');
    }

    public function infernal(): int
    {
        return $this->getOriginIdByName(name: 'Magia Infernal');
    }

    public function forbidden(): int
    {
        return $this->getOriginIdByName(name: 'Magia Prohibida');
    }
}
