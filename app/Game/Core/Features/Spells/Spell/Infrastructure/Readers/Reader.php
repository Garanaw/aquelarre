<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Spell\Infrastructure\Readers;

use App\Game\Core\Features\Spells\Spell\Infrastructure\Models\Spell;

class Reader
{
    public function __construct(
        private readonly Spell $spell,
    ) {
    }
}
