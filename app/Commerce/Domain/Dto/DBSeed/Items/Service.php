<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Items;

use Aquelarre\Commerce\Domain\Dto\DBSeed\Items\Concerns\HasOrigin;

class Service extends Item
{
    use HasOrigin;

    public static function ofItemName(string $name): static
    {
        return new static([
            'name' => $name,
            'type' => 'service',
            'family' => null,
            'origin' => null,
            'material' => null,
            'weight' => null,
            'is_wearable' => false,
            'is_consumable' => false,
            'is_storable' => false,
            'is_container' => false,
        ]);
    }
}
