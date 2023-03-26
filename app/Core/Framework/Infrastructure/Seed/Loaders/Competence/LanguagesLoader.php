<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Competence;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class LanguagesLoader implements Loader
{
    /** @var null|Collection<string, int> */
    private ?Collection $languages = null;

    public function __construct(
        private readonly DatabaseManager $db,
        private readonly Repository $cache,
    ) {
    }

    public function load(): Collection
    {
        return $this->languages = $this->cache->remember(
            key: 'seed-languages',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table(table: 'competences')
                ->select('id', 'name')
                ->where(column: 'is_language', operator: '=', value: true)
                ->get()
                ->mapWithKeys(callback: static fn (object $competence) => [
                    Str::slug($competence->name) => $competence->id,
                ])
        );
    }

    public function getLanguageIdByName(string $name): int
    {
        return $this->languages->get(
            key: Str::slug(title: $name),
        );
    }

    public function andalusi(): int
    {
        return $this->getLanguageIdByName(name: 'Andalusi');
    }

    public function arabic(): int
    {
        return $this->getLanguageIdByName(name: 'arabe');
    }

    public function aragones(): int
    {
        return $this->getLanguageIdByName(name: 'Aragonés');
    }

    public function bable(): int
    {
        return $this->getLanguageIdByName(name: 'bable');
    }

    public function castilian(): int
    {
        return $this->getLanguageIdByName(name: 'castellano');
    }

    public function catalan(): int
    {
        return $this->getLanguageIdByName(name: 'catalán');
    }

    public function euskera(): int
    {
        return $this->getLanguageIdByName(name: 'euskera');
    }

    public function galician(): int
    {
        return $this->getLanguageIdByName(name: 'gallego');
    }

    public function greek(): int
    {
        return $this->getLanguageIdByName(name: 'griego');
    }

    public function hebrew(): int
    {
        return $this->getLanguageIdByName(name: 'hebreo');
    }

    public function ladino(): int
    {
        return $this->getLanguageIdByName(name: 'ladino');
    }

    public function latin(): int
    {
        return $this->getLanguageIdByName(name: 'latín');
    }

    public function mozarabic(): int
    {
        return $this->getLanguageIdByName(name: 'mozarabe');
    }
}
