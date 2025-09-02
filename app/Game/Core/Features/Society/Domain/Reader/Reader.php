<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Society\Domain\Reader;

use App\Game\Core\Features\Society\Infrastructure\Collection\Societies;
use App\Game\Core\Features\Society\Infrastructure\Reader\Reader as SocietyReader;

class Reader
{
    public function __construct(
        private readonly SocietyReader $reader,
    ) {
    }

    public function all(): Societies
    {
        return $this->reader->all();
    }
}
