<?php

declare(strict_types = 1);

namespace Aquelarre\Core\Shared\Domain\Dice;

use OutOfRangeException;

final class DiceGroup
{
    /** @var array<Dice> */
    private array $dice = [];

    /**
     * @param int $pNumber Number of die
     * @param int $pSides Number of sides of each dice
     */
    public function __construct(int $pNumber, int $pSides)
    {
        $number = filter_var($pNumber, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);

        if (!$number) {
            throw new OutOfRangeException('Invalid number of die.');
        }

        for ($i = 0; $i < $number; $i++) {
            $this->dice[] = new Dice($pSides);
        }
    }

    public function roll() : int
    {
        $sum = 0;
        foreach ($this->dice as $dice) {
            $sum += $dice->roll();
        }
        return $sum;
    }
}
