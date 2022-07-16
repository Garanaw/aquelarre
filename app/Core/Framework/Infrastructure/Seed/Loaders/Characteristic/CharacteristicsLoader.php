<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Characteristic;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class CharacteristicsLoader implements Loader
{
    private ?Collection $characteristics = null;

    public function __construct(
        private readonly DatabaseManager $db,
        private readonly Repository $cache,
    ) {
    }

    public function load(): Collection
    {
        return $this->characteristics = $this->cache->remember(
            key: 'seed-characteristics',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table('characteristics')
                ->select('id', 'prefix')
                ->get()
                ->mapWithKeys(callback: static fn (object $characteristic) => [
                    Str::lower($characteristic->prefix) => $characteristic->id,
                ])
        );
    }

    public function characteristic(string $prefix): int
    {
        return $this->characteristics->get($prefix);
    }

    public function culture(): int
    {
        return $this->characteristic('cul');
    }

    public function perception(): int
    {
        return $this->characteristic('per');
    }

    public function agility(): int
    {
        return $this->characteristic('agi');
    }

    public function strength(): int
    {
        return $this->characteristic('fue');
    }

    public function ability(): int
    {
        return $this->characteristic('hab');
    }

    public function communication(): int
    {
        return $this->characteristic('com');
    }

    public function aspect(): int
    {
        return $this->characteristic('asp');
    }
}
