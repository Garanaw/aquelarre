<?php

declare(strict_types=1);

namespace Aquelarre\Core\Kingdom\Domain\Services;

use Aquelarre\Core\Kingdom\Domain\Dto\Roll;
use Aquelarre\Core\Kingdom\Domain\Enum\RollRange;
use Aquelarre\Core\Kingdom\Infrastructure\Models\Kingdom;
use Aquelarre\Core\Kingdom\Infrastructure\Repositories\Reader as Repository;
use Aquelarre\Core\Shared\Domain\Dice\Dice;

class Reader
{
    public function __construct(private readonly Repository $reader)
    {
    }

    public function rollKingdom(): Kingdom
    {
        $roll = Roll::fromDice(
            dice: new Dice(sides: RollRange::MAX->value)
        );

        return $this->reader->rollKingdom(roll: $roll);
    }
}
