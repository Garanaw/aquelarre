<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Items;

use Aquelarre\Commerce\Domain\Dto\DBSeed\Items\Concerns\HasOrigin;

class Weapon extends Item
{
    use HasOrigin;

    public static function ofItemName(string $name): static
    {
        return new static([
            'name' => $name,
            'type' => 'weapon',
            'family' => null,
            'origin' => null,
            'material' => null,
            'weight' => null,
            'is_wearable' => true,
            'is_consumable' => false,
            'is_storable' => false,
            'is_container' => false,
        ]);
    }

    public function family(string $family): static
    {
        $this->family = $family;
        return $this;
    }

    public function bow(): static
    {
        return $this->family('arco');
    }

    public function crossbow(): static
    {
        return $this->family('ballesta');
    }

    public function sword(): static
    {
        return $this->family('espada');
    }

    public function greatSword(): static
    {
        return $this->family('espadón');
    }

    public function dagger(): static
    {
        return $this->family('cuchillo');
    }

    public function mace(): static
    {
        return $this->family('maza');
    }

    public function axe(): static
    {
        return $this->family('hacha');
    }

    public function spear(): static
    {
        return $this->family('lanza');
    }

    public function staff(): static
    {
        return $this->family('palo');
    }

    public function sling(): static
    {
        return $this->family('honda');
    }
}
