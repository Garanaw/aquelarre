<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Competence;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class CompetencesLoader implements Loader
{
    private ?Collection $competences = null;

    public function __construct(
        private readonly DatabaseManager $db,
        private readonly Repository $cache,
    ) {
    }

    public function load(): Collection
    {
        return $this->competences = $this->cache->remember(
            key: 'seed-competences',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table(table: 'competences')
                ->select(columns: ['id', 'name'])
                ->get()
                ->mapWithKeys(callback: static fn (object $competence) => [
                    Str::slug(title: $competence->name, separator: '_') => $competence->id,
                ])
        );
    }

    public function get(string $name): int
    {
        return $this->competences->get(
            key: Str::slug(title: $name, separator: '_'),
        );
    }
}
