<?php

declare(strict_types=1);

namespace App\Shared\Optimus;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Jenssegers\Optimus\Optimus;

/**
 * @property int $encoded_id
 */
trait UsesOptimus
{
    protected static ?Optimus $optimus = null;

    public function encodedId(): Attribute
    {
        $optimus = $this->getOptimus();

        return new Attribute(
            get: fn () => $optimus->encode($this->id),
            set: fn ($value) => $this->id = $optimus->decode((int)$value),
        );
    }

    #[\Override]
    public function getRouteKey()
    {
        $id = parent::getRouteKey();

        return $this->getOptimus()->encode($id);
    }

    #[\Override]
    public function resolveRouteBinding($value, $field = null)
    {
        [$field, $value] = $this->getOptimusFieldAndValue($value, $field);

        return $this->where($field, $value)->first();
    }

    /** @inheritDoc */
    #[\Override]
    public function resolveRouteBindingQuery($query, $value, $field = null): Builder
    {
        [$field, $value] = $this->getOptimusFieldAndValue($value, $field);

        return $query->where($field, $value);
    }

    protected function getOptimusFieldAndValue($value, $field = null): array
    {
        if ($field === null) {
            $field = $this->getRouteKeyName();
        }

        if (is_string($value) && ctype_digit($value)) {
            $value = (int) $value;
        }

        if (is_int($value) && $field === $this->getRouteKeyName()) {
            $value = $this->getOptimus()->decode($value);
        }

        return [$field, $value];
    }

    protected function getOptimus(): Optimus
    {
        if (static::$optimus === null) {
            static::$optimus = app(OptimusManager::class)->connection($this->optimusConnection ?? null);
        }

        return static::$optimus;
    }

    public static function getOptimusInstance(): Optimus
    {
        return new static()->getOptimus();
    }

    public static function encodeId(int $id): int
    {
        return new static()->getOptimus()->encode($id);
    }

    public static function decodeId(int $encoded): int
    {
        return new static()->getOptimus()->decode($encoded);
    }

    protected function getOptimusConnection(): string
    {
        return $this->optimusConnection ?? 'main';
    }

    public function __destruct()
    {
        static::$optimus = null;
    }
}
