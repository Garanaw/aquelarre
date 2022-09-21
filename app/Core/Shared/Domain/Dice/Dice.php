<?php

declare(strict_types = 1);

namespace Aquelarre\Core\Shared\Domain\Dice;

use OutOfRangeException;

final class Dice
{
    private array $rolls = [];

    public function __construct(private readonly int $sides)
    {
        if ($sides <= 1) {
            throw new OutOfRangeException(message: 'Your dice must have at least 2 sides.');
        }
    }

    public function roll(): int
    {
        return $this->rolls[] = mt_rand(1, $this->sides);
    }
}
