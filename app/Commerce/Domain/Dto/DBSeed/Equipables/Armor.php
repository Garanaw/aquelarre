<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Equipables;

/**
 * @property int $item_id
 * @property string $type
 * @property int $protection
 * @property int $resistance
 * @property ?int $strength
 * @property ?int $created_by
 */
class Armor extends Equipable
{
    private const LIGHT = 'ligera';

    private const SOFT = 'blanda';

    private const METALLIC = 'metálica';

    private const FULL = 'completa';

    private const HELMET = 'casco';

    public static function ofItemId(int $itemId): static
    {
        return new static([
            'item_id' => $itemId,
            'type' => null,
            'protection' => null,
            'resistance' => null,
            'strength' => null,
            'created_by' => null,
        ]);
    }

    public function type(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function soft(): static
    {
        return $this->type(self::SOFT);
    }

    public function light(): static
    {
        return $this->type(self::LIGHT);
    }

    public function metallic(): static
    {
        return $this->type(self::METALLIC);
    }

    public function full(): static
    {
        return $this->type(self::FULL);
    }

    public function helmet(): static
    {
        return $this->type(self::HELMET);
    }

    public function protection(int $protection): static
    {
        $this->protection = $protection;
        return $this;
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
}
