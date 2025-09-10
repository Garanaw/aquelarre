<?php

declare(strict_types=1);

namespace App\Game\DiceBoard\Domain\DiceSystem;

use Illuminate\Support\Fluent;

/**
 * @property int $sides
 */
class Dice extends Fluent
{
    public function __construct(int $sides)
    {
        parent::__construct([
            'sides' => $sides,
        ]);
    }

    public function roll(): int
    {
        return random_int(1, $this->sides);
    }
}
