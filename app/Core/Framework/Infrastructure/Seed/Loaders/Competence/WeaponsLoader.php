<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Competence;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class WeaponsLoader implements Loader
{
    /** @var null|Collection<string, int> */
    private ?Collection $weapons = null;

    public function __construct(
        protected readonly DatabaseManager $db,
        protected readonly Repository $cache,
    ) {
    }

    public function load(): Collection
    {
        return $this->weapons = $this->cache->remember(
            key: 'seed-weapon-competences',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table(table: 'competences')
                ->select('id', 'name')
                ->where(column: 'is_weapon', operator: '=', value: true)
                ->get()
                ->mapWithKeys(callback: static fn (object $competence) => [
                    Str::slug($competence->name) => $competence->id,
                ])
        );
    }

    protected function getWeapons(): Collection
    {
        return $this->weapons;
    }

    public function getWeaponIdByName(string $name): int
    {
        return $this->weapons->get(
            key: Str::slug(title: $name),
        );
    }

    public function sword(): int
    {
        return $this->getWeaponIdByName(name: 'Espada');
    }
}