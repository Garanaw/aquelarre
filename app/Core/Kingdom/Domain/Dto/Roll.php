<?php

declare(strict_types=1);

namespace Aquelarre\Core\Kingdom\Domain\Dto;

use Aquelarre\Core\Kingdom\Domain\Enum\RollRange;
use Aquelarre\Core\Shared\Domain\Dice\Dice;

/**
 * @psalm-immutable
 * @TODO To be refactored so that it takes MIN and MAX values from RollRange enum so that it can be used in other places
 */
class Roll
{
    public function __construct(private readonly int $roll)
    {
        if (RollRange::isValid($roll) === false) {
            throw new \OutOfRangeException(
                message: sprintf('Your roll must be between 1 and 10, given roll: %d', $roll),
            );
        }
    }

    public static function fromDice(Dice $dice): self
    {
        return new self($dice->roll());
    }

    public function getRoll(): int
    {
        return $this->roll;
    }
}
