<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition;

use Aquelarre\Core\Shared\Domain\Support\Str;

trait FindsSocialPosition
{
    public function socialPosition(string $name): int
    {
        try {
            return $this->socialPositions->first(
                callback: fn(object $socialPosition): bool => Str::slugsMatch(
                    first: $socialPosition->name,
                    second: $name,
                ),
            )->id;
        } catch (\Throwable) {
            dd($name, $this);
        }
    }
}
