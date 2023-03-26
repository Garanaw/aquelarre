<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Items;

use Aquelarre\Commerce\Domain\Dto\DBSeed\Items\Concerns\HasOrigin;

class Shield extends Item
{
    use HasOrigin;

    public static function ofItemName(string $name): static
    {
        return new static([
            'name' => $name,
            'type' => 'shield',
            'family' => null,
            'origin' => null,
            'material' => null,
            'weight' => null,
            'is_wearable' => true,
            'is_consumable' => false,
            'is_storable' => true,
            'is_container' => false,
        ]);
    }

    public function leather(): static
    {
        $this->material = 'cuero';
        return $this;
    }

    public function wood(): static
    {
        $this->material = 'madera';
        return $this;
    }

    public function metal(): static
    {
        $this->material = 'metal';
        return $this;
    }
}
