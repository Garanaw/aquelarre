<?php

declare(strict_types=1);

namespace Aquelarre\Core\Shared\Domain\Support;

use Illuminate\Support\Str as BaseStr;

class Str extends BaseStr
{
    /** @SuppressWarnings(PHPMD.ShortMethodName) */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingAnyTypeHint -- baseline
    public static function of($string): Stringable
    {
        return new Stringable(value: $string);
    }

    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingAnyTypeHint -- baseline
    public static function sprintf(string $format, ...$args): Stringable
    {
        return new Stringable(value: sprintf($format, ...$args));
    }

    public static function slugsMatch(string $first, string $second): bool
    {
        return Str::slug($first) === Str::slug($second);
    }
}
