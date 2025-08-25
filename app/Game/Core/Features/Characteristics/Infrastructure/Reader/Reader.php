<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Characteristics\Infrastructure\Reader;

use App\Game\Core\Features\Characteristics\Domain\Collection\CharacteristicCollection;
use App\Game\Core\Features\Characteristics\Infrastructure\Models\Characteristic;

class Reader
{
    public function __construct(
        private readonly Characteristic $characteristic,
    ) {
    }

    public function all(): CharacteristicCollection
    {
        return $this->characteristic->all();
    }
}
