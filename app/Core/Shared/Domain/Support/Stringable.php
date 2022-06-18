<?php

declare(strict_types=1);

namespace Aquelarre\Core\Shared\Domain\Support;

use Illuminate\Support\Stringable as BaseStringable;

class Stringable extends BaseStringable
{
    public function sprintf(string $format, ?int $index = null, ...$args): Stringable
    {
        if (count($args) === 0) {
            return Str::sprintf($format, $this->value());
        }

        if (count($args) === 1) {
            return Str::sprintf($format, $this->value(), $args[0]);
        }

        if (is_integer($args[0])) {
            $newArgs = [];
            $targetIndex = array_pop($args);
            foreach ($args as $index => $arg) {
                if ($index === $args[0]) {
                    $newArgs[] = $this->value();
                    break;
                }
                $newArgs[] = $arg;
                $targetIndex++;
            }

            if (count($args) > $targetIndex) {
                $newArgs = array_merge($newArgs, array_slice($args, $targetIndex));
            }

            return Str::sprintf($format, ...$args);
        }

        return Str::sprintf($format, ...$args);
    }
}
