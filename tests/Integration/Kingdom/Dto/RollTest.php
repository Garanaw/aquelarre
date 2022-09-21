<?php

declare(strict_types=1);

namespace Tests\Integration\Kingdom\Dto;

use Aquelarre\Core\Kingdom\Domain\Dto\Roll;
use Aquelarre\Core\Shared\Domain\Dice\Dice;
use Tests\TestCase;

/**
 * @coversDefaultClass \Aquelarre\Core\Kingdom\Domain\Dto\Roll
 * @group kingdom
 */
class RollTest extends TestCase
{
    /**
     * @test
     * @covers ::getRoll
     * @group roll
     */
    public function itGetsRoll(): void
    {
        $sut = new Roll(roll: 1);

        $this->assertSame(1, $sut->getRoll());
    }

    /**
     * @test
     * @covers ::fromDice
     * @covers \Aquelarre\Core\Shared\Domain\Dice\Dice
     * @group roll
     */
    public function itCreatesFromDice(): void
    {
        $sut = Roll::fromDice(dice: new Dice(sides: 2));

        $this->assertThat(
            value: $sut->getRoll(),
            constraint: $this->logicalOr(
                $this->greaterThanOrEqual(1),
                $this->lessThanOrEqual(2),
            ),
        );
    }

    /**
     * @test
     * @covers ::__construct
     * @group roll
     */
    public function itThrowsExceptionWhenRollIsInvalid(): void
    {
        $this->expectException(\OutOfRangeException::class);
        $this->expectExceptionMessage('Your roll must be between 1 and 10, given roll: 11');

        new Roll(roll: 11);
    }
}
