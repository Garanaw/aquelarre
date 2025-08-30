<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Nature\Infrastructure\Collection;

use App\Game\Core\Features\Spells\Nature\Domain\Enum\Nature;
use App\Game\Core\Features\Spells\Nature\Infrastructure\Models\SpellNature;
use Illuminate\Database\Eloquent\Collection;

class NatureCollection extends Collection
{
    public function white(): SpellNature
    {
        return $this->first(static fn (SpellNature $item) => $item->name->is(Nature::WHITE->value));
    }

    public function black(): SpellNature
    {
        return $this->first(static fn (SpellNature $item) => $item->name->is(Nature::BLACK->value));
    }
}
