<?php

declare(strict_types=1);

namespace App\Game\DiceBoard\Domain\DiceSystem;

use Illuminate\Support\Arr;
use Illuminate\Support\Fluent;

/**
 * @property Dice[] $dice
 */
class DiceCup extends Fluent
{
    public function __construct(Dice|array ...$dice)
    {
        $dice = Arr::wrap($dice);
        $dice = Arr::flatten($dice);

        parent::__construct([
            'dice' => $dice,
        ]);
    }

    public function add(Dice $die): self
    {
        $this->dice[] = $die;

        return $this;
    }

    public function addMany(array $dice): self
    {
        $this->dice = array_merge($this->dice, $dice);

        return $this;
    }

    public function roll(): int
    {
        return array_sum($this->results());
    }

    public function results(): array
    {
        return array_map(static fn (Dice $die) => $die->roll(), $this->dice);
    }
}
