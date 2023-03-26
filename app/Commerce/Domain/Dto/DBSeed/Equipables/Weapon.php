<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Equipables;

/**
 * @property int $item_id
 * @property int $weapon_type_id
 * @property string $size
 * @property int $strength
 * @property ?int $assaults_to_reload
 * @property ?string $damage
 * @property int $bonus
 * @property ?string $range
 */
class Weapon extends Equipable
{
    private const LIGHT = 'ligera';

    private const MID = 'medio';

    private const HEAVY = 'pesado';

    public static function ofItemId(int $itemId): static
    {
        return new static([
            'item_id' => $itemId,
            'weapon_type_id' => null,
            'strength' => null,
            'size' => null,
            'assaults_to_reload' => null,
            'damage' => null,
            'bonus' => 0,
            'range' => null,
        ]);
    }

    public function type(int $typeId): static
    {
        $this->weapon_type_id = $typeId;
        return $this;
    }

    public function strength(int $strength): static
    {
        $this->strength = $strength;
        return $this;
    }

    public function light(): static
    {
        $this->size = self::LIGHT;
        return $this;
    }

    public function mid(): static
    {
        $this->size = self::MID;
        return $this;
    }

    public function heavy(): static
    {
        $this->size = self::HEAVY;
        return $this;
    }

    public function reload(int $assaults): static
    {
        $this->assaults_to_reload = $assaults;
        return $this;
    }

    public function damage(string $damage): static
    {
        $this->damage = $damage;
        return $this;
    }

    public function bonus(int $bonus): static
    {
        $this->bonus = $bonus;
        return $this;
    }

    public function range(string $range): static
    {
        $this->range = $range;
        return $this;
    }
}
