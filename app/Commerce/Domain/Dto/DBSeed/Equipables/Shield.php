<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Equipables;

/**
 * @property int $item_id
 * @property int $resistance
 * @property int $strength
 * @property ?string $max_absorbed_damage
 * @property ?int $created_by
 */
class Shield extends Equipable
{
    public static function ofItemId(int $itemId): static
    {
        return new static([
            'item_id' => $itemId,
            'resistance' => null,
            'strength' => null,
            'max_absorbed_damage' => null,
            'created_by' => null,
        ]);
    }

    public function resistance(int $resistance): static
    {
        $this->resistance = $resistance;
        return $this;
    }

    public function strength(int $strength): static
    {
        $this->strength = $strength;
        return $this;
    }

    public function damage(string $damage): static
    {
        $this->max_absorbed_damage = $damage;
        return $this;
    }

    public function createdBy(int $createdBy): static
    {
        $this->created_by = $createdBy;
        return $this;
    }
}
