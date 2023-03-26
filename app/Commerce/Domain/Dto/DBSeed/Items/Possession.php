<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Items;

// phpcs:ignoreFile
class Possession extends Item
{
    public static function ofItemName(string $name): static
    {
        return new static([
            'name' => $name,
            'type' => 'possession',
            'family' => 'posesión',
            'origin' => null,
            'material' => null,
            'weight' => null,
            'is_wearable' => false,
            'is_storable' => false,
            'is_container' => true,
            'is_consumable' => false,
        ]);
    }

    public function house(): static
    {
        $this->family = 'casa';
        return $this;
    }

    public function tower(): static
    {
        $this->family = 'torre';
        return $this;
    }

    public function castle(): static
    {
        $this->family = 'castillo';
        return $this;
    }

    public function other(): static
    {
        $this->family = 'otro';
        return $this;
    }

    public function noContainer(): static
    {
        $this->is_container = false;
        return $this;
    }
}
