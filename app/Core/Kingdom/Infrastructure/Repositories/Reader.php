<?php

declare(strict_types=1);

namespace Aquelarre\Core\Kingdom\Infrastructure\Repositories;

use Aquelarre\Core\Kingdom\Domain\Dto\Roll;
use Aquelarre\Core\Kingdom\Infrastructure\Models\Kingdom;

class Reader
{
    public function __construct(private readonly Kingdom $kingdom)
    {
    }

    public function rollKingdom(Roll $roll): Kingdom
    {
        return $this->kingdom->query()->byRoll($roll)->first();
    }
}
