<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Kingdom\Infrastructure\Reader;

use App\Game\Core\Features\Kingdom\Infrastructure\Models\Kingdom;
use App\Game\DiceBoard\Domain\DiceSystem\DiceCup;
use Illuminate\Support\Enumerable;

class Reader
{
    public function __construct(
        private readonly Kingdom $kingdom,
    ) {
    }

    public function all(): Enumerable
    {
        return $this->kingdom->newQuery()->get();
    }

    public function roll(DiceCup $cup): ?Kingdom
    {
        return $this->kingdom->newQuery()->firstByRoll($cup);
    }
}
