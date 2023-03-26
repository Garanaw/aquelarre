<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Items;

use Aquelarre\Core\Shared\Domain\Support\Str;

class Jewel extends Item
{
    public static function ofItemName(string $name): static
    {
        return new static([
            'name' => $name,
            'type' => 'joya',
            'family' => $name,
            'origin' => null,
            'material' => null,
            'weight' => null,
            'is_wearable' => true,
            'is_consumable' => false,
            'is_storable' => true,
            'is_container' => false,
        ]);
    }

    public function jewelGold(): static
    {
        $this->material = 'oro con joyas';
        $this->addMaterialToName();
        return $this;
    }

    public function gold(): static
    {
        $this->material = 'oro';
        $this->addMaterialToName();
        return $this;
    }

    public function silver(): static
    {
        $this->material = 'plata';
        $this->addMaterialToName();
        return $this;
    }

    public function bronze(): static
    {
        $this->material = 'bronce';
        $this->addMaterialToName();
        return $this;
    }

    public function description(string $description): Item
    {
        return parent::description(
            sprintf($description, $this->material)
        );
    }

    private function addMaterialToName(): void
    {
        $this->name = Str::of($this->name)->append(' de ', $this->material);
    }
}
