<?php

declare(strict_types=1);

namespace App\Game\DiceBoard\Domain\DiceSystem;

class Factory
{
    public function __construct(
        private readonly DiceCup $cup = new DiceCup([]),
    ) {
    }

    public static function make(): self
    {
        return new self();
    }

    public function get(): DiceCup
    {
        return $this->create();
    }

    public function create(): DiceCup
    {
        return $this->cup;
    }

    public function d3(int $count = 1): self
    {
        return new self()->create(
            array_map(static fn () => new Dice(3), range(1, $count))
        );
    }

    public function d4(int $count = 1): self
    {
        $this->cup->addMany(
            array_map(static fn () => new Dice(4), range(1, $count))
        );

        return $this;
    }

    public function d6(int $count = 1): self
    {
        $this->cup->addMany(
            array_map(static fn () => new Dice(6), range(1, $count))
        );

        return $this;
    }

    public function d10(int $count = 1): self
    {
        $this->cup->addMany(
            array_map(static fn () => new Dice(10), range(1, $count))
        );

        return $this;
    }

    public function d8(int $count = 1): self
    {
        $this->cup->addMany(
            array_map(static fn () => new Dice(8), range(1, $count))
        );

        return $this;
    }

    public function d12(int $count = 1): self
    {
        $this->cup->addMany(
            array_map(static fn () => new Dice(12), range(1, $count))
        );

        return $this;
    }

    public function d20(int $count = 1): self
    {
        $this->cup->addMany(
            array_map(static fn () => new Dice(20), range(1, $count))
        );

        return $this;
    }

    public function d100(int $count = 1): self
    {
        $this->cup->addMany(
            array_map(static fn () => new Dice(100), range(1, $count))
        );

        return $this;
    }
}
