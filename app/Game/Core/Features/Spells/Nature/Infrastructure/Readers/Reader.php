<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Nature\Infrastructure\Readers;

use App\Game\Core\Features\Spells\Nature\Infrastructure\Models\SpellNature;
use Illuminate\Support\Enumerable;

class Reader
{
    public function __construct(
        private readonly SpellNature $nature,
    ) {
    }

    public function all(): Enumerable
    {
        return $this->nature->all();
    }
}
