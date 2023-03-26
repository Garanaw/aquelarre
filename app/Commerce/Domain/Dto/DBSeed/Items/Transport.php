<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Items;

class Transport extends Item
{
    public static function ofItemName(string $name): static
    {
        return new static([
            'name' => $name,
            'type' => 'transport',
            'family' => 'transporte',
            'origin' => null,
            'material' => null,
            'weight' => null,
            'is_wearable' => false,
            'is_storable' => false,
            'is_container' => false,
            'is_consumable' => false,
        ]);
    }

    public function mount(): static
    {
        $this->family = 'montura';
        return $this;
    }

    public function boat(): static
    {
        $this->family = 'embarcación';
        return $this;
    }

    public function car(): static
    {
        $this->family = 'carruaje';
        return $this;
    }
}
