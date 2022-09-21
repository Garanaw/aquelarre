<?php

declare(strict_types = 1);

namespace Aquelarre\Core\Shared\Domain\Dice;

final class Cup
{
    /**
     *  Will contain all groups of die put in the cup
     * @var array<DiceGroup>
     */
    private array $groups = [];

    public function addGroup(DiceGroup $group): self
    {
        $this->groups[] = $group;

        return $this;
    }

    public function roll() : int
    {
        return collect(value: $this->groups)->sum(
            callback: fn(DiceGroup $group): int => $group->roll()
        );
    }
}
