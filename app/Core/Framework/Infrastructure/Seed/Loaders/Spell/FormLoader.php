<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Spell;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class FormLoader implements Loader
{
    /** @var Collection<string, int>|null  */
    private ?Collection $forms = null;

    public function __construct(
        private readonly DatabaseManager $db,
        private readonly Repository $cache
    ) {
    }

    public function load(): Collection
    {
        return $this->forms = $this->cache->remember(
            key: 'seed-forms',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table('spell_forms')
                ->select('id', 'name')
                ->get()
                ->mapWithKeys(callback: static fn (object $form) => [
                    Str::slug($form->name) => $form->id,
                ])
        );
    }

    public function getFormIdByName(string $name): int
    {
        return $this->forms->get(
            key: Str::slug(title: $name),
        );
    }

    public function talisman(): int
    {
        return $this->getFormIdByName(name: 'Talisman');
    }

    public function hex(): int
    {
        return $this->getFormIdByName(name: 'Maleficio');
    }

    public function summon(): int
    {
        return $this->getFormIdByName(name: 'Invocación');
    }

    public function potion(): int
    {
        return $this->getFormIdByName(name: 'Poción');
    }

    public function ointment(): int
    {
        return $this->getFormIdByName(name: 'Ungüento');
    }
}
