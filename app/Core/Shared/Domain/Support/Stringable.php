<?php

declare(strict_types=1);

namespace Aquelarre\Core\Shared\Domain\Support;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Stringable as BaseStringable;

class Stringable extends BaseStringable implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return new static($value);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return $value->toString();
    }

    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingAnyTypeHint -- baseline
    public function sprintf(string $format, ?int $index = null, ...$args): Stringable
    {
        if (count(value: $args) === 0) {
            return Str::sprintf($format, $this->value());
        }

        if (count(value: $args) === 1) {
            return Str::sprintf($format, $this->value(), $args[0]);
        }

        if (is_integer($args[0])) {
            $newArgs = [];
            $targetIndex = array_pop(array: $args);
            foreach ($args as $index => $arg) {
                if ($index === $args[0]) {
                    $newArgs[] = $this->value();
                    break;
                // phpcs:ignore Squiz.WhiteSpace.ControlStructureSpacing.NoLineAfterClose -- baseline
                }
                $newArgs[] = $arg;
                $targetIndex++;
            }

            if (count($args) > $targetIndex) {
                $newArgs = array_merge(main: $newArgs, merge: array_slice(array: $args, offset: $targetIndex));
            }

            return Str::sprintf($format, ...$args);
        }

        return Str::sprintf($format, ...$args);
    }
}
