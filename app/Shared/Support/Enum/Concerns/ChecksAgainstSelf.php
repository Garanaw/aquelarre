<?php

declare(strict_types=1);

namespace App\Shared\Support\Enum\Concerns;

trait ChecksAgainstSelf
{
    public function is(self $enum): bool
    {
        return $this === $enum;
    }
}
