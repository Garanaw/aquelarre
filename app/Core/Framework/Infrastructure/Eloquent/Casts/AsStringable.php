<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Eloquent\Casts;

use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

// phpcs:disable
class AsStringable implements Castable
{
    /** @param array<int, mixed> $arguments */
    public static function castUsing(array $arguments)
    {
        return new class implements CastsAttributes
        {
            public function get($model, $key, $value, $attributes)
            {
                return isset($value) ? Str::of($value) : null;
            }

            /** @return string|null */
            public function set($model, $key, $value, $attributes)
            {
                return isset($value) ? (string) $value : null;
            }
        };
    }
}
