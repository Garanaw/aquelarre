<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Origin\Domain\Readers;

use App\Game\Core\Features\Spells\Origin\Infrastructure\Collection\OriginCollection;
use App\Game\Core\Features\Spells\Origin\Infrastructure\Readers\Reader as DbReader;

class Reader
{
    public function __construct(
        private readonly DbReader $reader,
    ) {
    }

    public function all(): OriginCollection
    {
        return $this->reader->all();
    }
}
