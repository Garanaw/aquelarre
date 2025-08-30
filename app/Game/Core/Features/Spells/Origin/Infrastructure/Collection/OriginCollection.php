<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Origin\Infrastructure\Collection;

use App\Game\Core\Features\Spells\Origin\Domain\Origin;
use App\Game\Core\Features\Spells\Origin\Infrastructure\Models\SpellOrigin;
use Illuminate\Database\Eloquent\Collection;

class OriginCollection extends Collection
{
    public function popular(): SpellOrigin
    {
        return $this->first(static fn (SpellOrigin $item) => $item->name->is(Origin::POPULAR->value));
    }

    public function alchemical(): SpellOrigin
    {
        return $this->first(static fn (SpellOrigin $item) => $item->name->is(Origin::ALCHEMICAL->value));
    }

    public function pagan(): SpellOrigin
    {
        return $this->first(static fn (SpellOrigin $item) => $item->name->is(Origin::PAGAN->value));
    }

    public function infernal(): SpellOrigin
    {
        return $this->first(static fn (SpellOrigin $item) => $item->name->is(Origin::INFERNAL->value));
    }

    public function forbidden(): SpellOrigin
    {
        return $this->first(static fn (SpellOrigin $item) => $item->name->is(Origin::FORBIDDEN->value));
    }
}
