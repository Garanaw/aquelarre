<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Profession;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class ProfessionLoader implements Loader
{
    private ?Collection $professions = null;

    public function __construct(
        private readonly DatabaseManager $db,
        private readonly Repository $cache,
    ) {
    }

    public function load(): Collection
    {
        return $this->professions = $this->cache->remember(
            key: 'seed-professions',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table('professions')
                ->select(columns: ['id', 'name', 'man'])
                ->get()
                ->mapWithKeys(callback: static function (object $profession) {
                    $slug = Str::slug($profession->name, '_');

                    if (preg_match("/[a-z]_?orden_militar/", $slug)) {
                        $slug .= $profession->man ? '_hombre' : '_mujer';
                    }

                    return [$slug => $profession->id];
                })
        );
    }

    public function profession(string $name): int
    {
        return $this->professions->get(key: Str::slug(title: $name, separator: '_'));
    }
}
