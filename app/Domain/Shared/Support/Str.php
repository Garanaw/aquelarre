<?php

declare(strict_types=1);

namespace Domain\Shared\Support;

use Illuminate\Support\Str as BaseStr;

class Str extends BaseStr
{
    public static function of($string): Stringable
    {
        return new Stringable($string);
    }

    public static function sprintf(string $format, ...$args): Stringable
    {
        return new Stringable(sprintf($format, ...$args));
    }
}
