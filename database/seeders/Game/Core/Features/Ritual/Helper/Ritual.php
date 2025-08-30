<?php

declare(strict_types=1);

namespace Database\Seeders\Game\Core\Features\Ritual\Helper;

use App\Books\Domain\Reader\Reader;
use Illuminate\Support\Fluent;

/**
 * @property string $name
 * @property string $latin
 * @property string $description
 * @property int $ordo
 * @property string $ceremony
 * @property string $duration
 * @property string $effects
 * @property int $book
 * @method static latin(string $latin)
 * @method static description(string $description)
 * @method static ordo(int $ordo)
 * @method static ceremony(string $ceremony)
 * @method static duration(string $duration)
 * @method static effects(string $effects)
 * @method static book(int $bookId)
 */
class Ritual extends Fluent
{
    public static function of(?string $name = null): static
    {
        $book = resolve(Reader::class)->getCached()->aq3ed()->id;

        return new static(
            attributes: $name
                ? ['name' => $name, 'book' => $book]
                : ['book' => $book]
        );
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'latin' => $this->latin,
            'ceremony' => $this->ceremony,
            'duration' => $this->duration,
            'effects' => $this->effects,
            'ordo' => $this->ordo,
            'book_id' => $this->book,
        ];
    }
}
