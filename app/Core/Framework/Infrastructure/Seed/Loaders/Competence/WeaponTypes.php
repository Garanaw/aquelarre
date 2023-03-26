<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Competence;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Support\Collection;

class WeaponTypes extends WeaponsLoader
{
    /** @var null|Collection<int, int> */
    private ?Collection $weaponTypes = null;

    public function load() : Collection
    {
        parent::load();

        return $this->weaponTypes = $this->cache->remember(
            key: 'seed-weapon-types',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table(table: 'weapon_types')
                ->select('id', 'competence_id')
                ->get()
                ->mapWithKeys(callback: static fn (object $type) => [
                    Str::slug($type->competence_id) => $type->id,
                ])
        );
    }

    public function getWeaponTypeIdByName(string $name): int
    {
        return $this->weaponTypes->get(
            $this->getWeapons()->get(
                key: Str::slug(title: $name),
            )
        );
    }

    public function swordType(): int
    {
        return $this->getWeaponTypeIdByName(name: 'Espadas');
    }

    public function greatSwordType(): int
    {
        return $this->getWeaponTypeIdByName(name: 'Espadones');
    }

    public function knifeType(): int
    {
        return $this->getWeaponTypeIdByName(name: 'Cuchillo');
    }

    public function bowType(): int
    {
        return $this->getWeaponTypeIdByName(name: 'Arco');
    }

    public function crossbowType(): int
    {
        return $this->getWeaponTypeIdByName(name: 'Ballesta');
    }

    public function axeType(): int
    {
        return $this->getWeaponTypeIdByName(name: 'Hachas');
    }

    public function clubType(): int
    {
        return $this->getWeaponTypeIdByName(name: 'Palos');
    }

    public function maceType(): int
    {
        return $this->getWeaponTypeIdByName(name: 'Mazas');
    }

    public function spearType(): int
    {
        return $this->getWeaponTypeIdByName(name: 'Lanzas');
    }

    public function slingType(): int
    {
        return $this->getWeaponTypeIdByName(name: 'Hondas');
    }
}