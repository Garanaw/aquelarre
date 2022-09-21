<?php

declare(strict_types=1);

namespace Tests\Integration\Kingdom\Domain\Services;

use Aquelarre\Core\Kingdom\Domain\Services\Reader;
use Aquelarre\Core\Kingdom\Infrastructure\Models\Kingdom;
use Aquelarre\Core\Kingdom\Infrastructure\Repositories\Reader as Repository;
use Tests\TestCase;

class ReaderTest extends TestCase
{
    /**
     * @test
     * @covers \Aquelarre\Core\Kingdom\Domain\Services\Reader::rollKingdom
     * @covers \Aquelarre\Core\Shared\Domain\Dice\Dice
     * @group roll
     */
    public function itRollsKingdom(): void
    {
        $reader = $this->mock(Repository::class);
        $reader->shouldReceive('rollKingdom')->once()->andReturn(new Kingdom());

        /** @var Repository $reader */
        $sut = new Reader($reader);
        $sut->rollKingdom();
    }
}
