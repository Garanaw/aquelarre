<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Kingdom\Domain\Reader;

use App\Game\Core\Features\Kingdom\Infrastructure\Models\Kingdom;
use App\Game\Core\Features\Kingdom\Infrastructure\Reader\Reader as KingdomReader;
use App\Game\DiceBoard\Domain\DiceSystem\Factory;

class Reader
{
    public function __construct(
        private readonly KingdomReader $reader,
    ) {
    }

    public function roll(): Kingdom
    {
        return $this->reader->roll(
            Factory::make()->d10()->get()
        );
    }
}
