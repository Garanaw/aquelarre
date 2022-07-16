<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Society;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class TheologyLoader implements Loader
{
    private ?Collection $theologies = null;

    public function __construct(
        private readonly DatabaseManager $db,
        private readonly Repository $cache
    ) {
    }

    public function load(): Collection
    {
        return $this->theologies = $this->cache->remember(
            key: 'seed-theologies',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table('theologies')
                ->select('id', 'name')
                ->get()
                ->mapWithKeys(callback: static fn (object $theology) => [
                    Str::slug($theology->name) => $theology->id,
                ])
        );
    }

    public function getTheologyIdByName(string $name): int
    {
        return $this->theologies->get(
            key: Str::slug(title: $name),
        );
    }

    public function cristianism(): int
    {
        return $this->getTheologyIdByName(name: 'Cristianismo');
    }

    public function judaism(): int
    {
        return $this->getTheologyIdByName(name: 'Judaísmo');
    }

    public function islam(): int
    {
        return $this->getTheologyIdByName(name: 'Islamismo');
    }

    public function paganism(): int
    {
        return $this->getTheologyIdByName(name: 'Paganismo');
    }
}
