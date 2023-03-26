<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Items;

use Aquelarre\Commerce\Domain\Dto\DBSeed\Items\Concerns\HasOrigin;

class Cloth extends Item
{
    use HasOrigin;

    public static function ofItemName(string $name): static
    {
        return new static([
            'name' => $name,
            'type' => 'cloth',
            'family' => 'ropa',
            'origin' => null,
            'material' => null,
            'weight' => null,
            'is_wearable' => true,
            'is_storable' => true,
            'is_container' => false,
            'is_consumable' => false,
        ]);
    }

    public function single(): static
    {
        $this->family = 'prendas sueltas';
        return $this;
    }
}
