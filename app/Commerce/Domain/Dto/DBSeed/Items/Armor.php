<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Items;

class Armor extends Item
{
    public static function ofItemName(string $name): static
    {
        return new static([
            'name' => $name,
            'type' => 'armor',
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

    public function helmet(): static
    {
        return $this->family('casco');
    }

    public function arm(): static
    {
        return $this->family('brazales');
    }

    public function leg(): static
    {
        return $this->family('grebas');
    }

    public function chest(): static
    {
        return $this->family('coraza');
    }

    public function full(): static
    {
        return $this->family('armadura completa');
    }
}
