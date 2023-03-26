<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Items;

use Aquelarre\Commerce\Domain\Dto\DBSeed\Items\Concerns\HasOrigin;

class Food extends Item
{
    use HasOrigin;

    public static function ofItemName(string $name): static
    {
        return new static([
            'name' => $name,
            'type' => 'food',
            'family' => 'comida',
            'origin' => null,
            'material' => null,
            'weight' => null,
            'is_wearable' => false,
            'is_storable' => true,
            'is_container' => false,
            'is_consumable' => true,
        ]);
    }

    public function drink(): static
    {
        $this->family = 'bebida';
        return $this;
    }

    public function animal(): static
    {
        $this->family = 'pienso';
        return $this;
    }
}
