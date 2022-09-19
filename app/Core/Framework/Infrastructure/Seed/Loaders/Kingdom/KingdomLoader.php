<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Kingdom;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class KingdomLoader implements Loader
{
    private ?Collection $kingdoms = null;

    public function __construct(
        private readonly DatabaseManager $db,
        private readonly Repository $cache,
    ) {
    }

    public function load(): Collection
    {
        return $this->kingdoms = $this->cache->remember(
            key: 'seed-kingdoms',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table(table: 'kingdoms')
                ->select('id', 'name')
                ->get()
                ->mapWithKeys(callback: static fn (object $kingdom) => [
                    Str::slug($kingdom->name) => $kingdom->id,
                ])
        );
    }

    public function kingdom(string $name): int
    {
        return $this->kingdoms->get(
            key: Str::slug(title: $name),
        );
    }

    public function castilla(): int
    {
        return $this->kingdom('corona de castilla');
    }

    public function aragon(): int
    {
        return $this->kingdom('corona de aragón');
    }

    public function granada(): int
    {
        return $this->kingdom('reino de granada');
    }

    public function navarra(): int
    {
        return $this->kingdom('reino de navarra');
    }

    public function portugal(): int
    {
        return $this->kingdom('reino de portugal');
    }
}
