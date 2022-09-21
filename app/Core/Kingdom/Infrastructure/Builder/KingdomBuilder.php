<?php

declare(strict_types=1);

namespace Aquelarre\Core\Kingdom\Infrastructure\Builder;

use Aquelarre\Core\Kingdom\Domain\Dto\Roll;
use Illuminate\Database\Eloquent\Builder;

class KingdomBuilder extends Builder
{
    public function byRoll(Roll $roll): self
    {
        return $this->whereHas(
            relation: 'roll',
            callback: static fn (Builder $query) => $query->where([
                ['min_roll', '<=', $roll->getRoll()], // phpcs:ignore Squiz.Arrays.ArrayDeclaration.SingleLineNotAllowed
                ['max_roll', '>=', $roll->getRoll()], // phpcs:ignore Squiz.Arrays.ArrayDeclaration.SingleLineNotAllowed
            ]),
        );
    }
}
