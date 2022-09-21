<?php

declare(strict_types=1);

namespace Tests\Feature\Core\Kingdom\Application\Actions;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @covers \Aquelarre\Core\Kingdom\Application\Actions\Roll
 * @group kingdom
 */
class RollTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @covers \Aquelarre\Core\Kingdom\Application\Actions\Roll::__invoke
     * @group roll
     */
    public function itRollsKingdom(): void
    {
        $this->get(route('kingdom.roll'))
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'description',
                    'peninsular',
                ],
            ]);
    }
}
