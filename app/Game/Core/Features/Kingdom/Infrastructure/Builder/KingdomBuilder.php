<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Kingdom\Infrastructure\Builder;

use App\Game\Core\Features\Kingdom\Infrastructure\Models\Kingdom;
use App\Game\DiceBoard\Domain\DiceSystem\DiceCup;
use Illuminate\Database\Eloquent\Builder;

class KingdomBuilder extends Builder
{
    public function firstByRoll(DiceCup $cup): Kingdom
    {
        $roll = $cup->roll();

        return $this->whereHas('roll',
            fn (Builder $query) => $query->where([
                ['min_roll', '<=', $roll],
                ['max_roll', '>=', $roll]
            ])
        )->firstOrFail();
    }
}
