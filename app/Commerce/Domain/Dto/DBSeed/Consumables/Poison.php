<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Consumables;

use Illuminate\Support\Fluent;

/**
 * @property int $item_id
 * @property int $resistance_roll
 * @property ?int $damage
 * @property ?int $rollover_time
 * @property ?string $rollover_time_unit
 * @property ?int $death_time
 * @property ?string $death_unit
 * @property string $effects
 */
// phpcs:ignoreFile
class Poison extends Fluent
{
    public static function fromItemId(int $itemId): self
    {
        return new self([
            'item_id' => $itemId,
            'resistance_roll' => 0,
            'damage' => null,
            'rollover_time' => null,
            'rollover_time_unit' => null,
            'death_time' => null,
            'death_unit' => null,
            'effects' => '',
        ]);
    }

    public function resistanceRoll(int $resistanceRoll): self
    {
        $this->resistance_roll = $resistanceRoll;
        return $this;
    }

    public function damage(int $damage): self
    {
        $this->damage = $damage;
        return $this;
    }

    public function rollover(int $time, string $unit): self
    {
        $this->rollover_time = $time;
        $this->rollover_time_unit = $unit;
        return $this;
    }

    public function death(int $time, string $unit): self
    {
        $this->death_time = $time;
        $this->death_unit = $unit;
        return $this;
    }

    public function effects(string $effects): self
    {
        $this->effects = $effects;
        return $this;
    }
}
