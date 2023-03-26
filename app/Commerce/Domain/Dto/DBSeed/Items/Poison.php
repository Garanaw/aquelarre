<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Items;

class Poison extends Item
{
    public static function ofItemName(string $name): static
    {
        return new static([
            'name' => $name,
            'type' => 'veneno',
            'family' => null,
            'origin' => null,
            'material' => null,
            'weight' => null,
            'is_wearable' => false,
            'is_consumable' => true,
            'is_storable' => true,
            'is_container' => false,
        ]);
    }
}
