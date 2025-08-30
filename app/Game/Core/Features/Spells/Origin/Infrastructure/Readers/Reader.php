<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Origin\Infrastructure\Readers;

use App\Game\Core\Features\Spells\Origin\Infrastructure\Collection\OriginCollection;
use App\Game\Core\Features\Spells\Origin\Infrastructure\Models\SpellOrigin;

class Reader
{
    public function __construct(
        private readonly SpellOrigin $origin,
    ) {
    }

    public function all(): OriginCollection
    {
        return $this->origin->all();
    }
}
