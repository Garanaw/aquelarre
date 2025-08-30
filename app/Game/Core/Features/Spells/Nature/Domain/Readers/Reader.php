<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Nature\Domain\Readers;

use App\Game\Core\Features\Spells\Nature\Infrastructure\Readers\Reader as DbReader;
use Illuminate\Support\Enumerable;

class Reader
{
    public function __construct(
        private readonly DbReader $reader,
    ) {
    }

    public function all(): Enumerable
    {
        return $this->reader->all();
    }
}
