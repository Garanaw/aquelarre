<?php

declare(strict_types=1);

namespace Aquelarre\Core\Shared\Domain\Dice;

final class CupFactory
{
    public function newInstance(string $pAsked = ''): Cup
    {
        $cup = new Cup();

        if ('' === $pAsked) {
            return $cup;
        }

        $parts = explode('+', $pAsked);

        foreach ($parts as $element) {
            $cup->addGroup($this->analyze($element));
        }

        return $cup;
    }

    private function analyze(string $pStr): DiceGroup
    {
        $tmp = explode('D', $pStr);
        $number = $tmp[0];
        $sides = $tmp[1];

        if (!$number) {
            $number = 1;
        }

        return new DiceGroup($number, (int)$sides);
    }
}
