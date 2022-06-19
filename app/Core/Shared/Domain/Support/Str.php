<?php

declare(strict_types=1);

namespace Aquelarre\Core\Shared\Domain\Support;

use Illuminate\Support\Str as BaseStr;

class Str extends BaseStr
{
    public static function of($string): Stringable
    {
        return new Stringable(value: $string);
    }

    public static function sprintf(string $format, ...$args): Stringable
    {
        return new Stringable(value: sprintf($format, ...$args));
    }
}
