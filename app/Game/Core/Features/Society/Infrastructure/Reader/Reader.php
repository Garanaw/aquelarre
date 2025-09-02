<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Society\Infrastructure\Reader;

use App\Game\Core\Features\Society\Infrastructure\Collection\Societies;
use App\Game\Core\Features\Society\Infrastructure\Models\Society;

class Reader
{
    public function __construct(
        private readonly Society $society,
    ) {
    }

    public function all(): Societies
    {
        return $this->society->all();
    }
}
