<?php

declare(strict_types=1);

namespace Aquelarre\Core\Rituals\Domain\Dto;

use Aquelarre\Core\Rituals\Infrastructure\Models\Ritual;
use Illuminate\Support\Fluent;

/**
 * @property string $name
 * @property string $latin
 * @property string $ceremony
 * @property string $duration
 * @property int $ordo
 * @property string $effects
 * @property int $book
 * @method static name(string $name)
 * @method static latin(?string $latin = null)
 * @method static ceremony(string $ceremony)
 * @method static duration(string $duration)
 * @method static ordo(int $ordo)
 * @method static effects(string $effects)
 * @method static book(int $bookId)
 */
class RitualFluent extends Fluent
{
    public function __construct(iterable|Ritual $attributes = [])
    {
        if ($attributes instanceof Ritual) {
            $attributes = $attributes->toArray();
        }

        parent::__construct(attributes: $attributes);
    }

    public static function make(string $name = null): static
    {
        return new static(
            attributes: $name ? ['name' => $name] : []
        );
    }

    /** @inheritDoc */
    public function toArray()
    {
        return $this->toDbData();
    }

    /** @return array<string, mixed> */
    public function toDbData(): array
    {
        return [
            'name' => $this->name,
            'latin' => $this->latin,
            'ceremony' => $this->ceremony,
            'duration' => $this->duration,
            'ordo' => $this->ordo,
            'effects' => $this->effects,
            'book_id' => $this->book,
        ];
    }
}
