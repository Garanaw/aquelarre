<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Items;

// phpcs:ignoreFile
class Commodity extends Item
{
    public static function ofItemName(string $name): static
    {
        return new static([
            'name' => $name,
            'type' => 'commodity',
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

    public function beast(): static
    {
        $this->family = 'ganado';
        return $this;
    }

    public function good(): static
    {
        $this->family = 'mercancía';
        return $this;
    }

    public function fabric(): static
    {
        $this->family = 'paño';
        return $this;
    }

    public function accoutrement(): static
    {
        $this->family = 'pertrecho';
        return $this;
    }

    public function various(): static
    {
        $this->family = 'varios';
        return $this;
    }

    public function noStorable(): static
    {
        $this->is_storable = false;
        return $this;
    }
}
