<?php

declare(strict_types=1);

namespace Database\Seeders\Game\Core\Features\Profession\Helpers;

use Illuminate\Support\Fluent;

/**
 * @property string $name
 * @property string $description
 * @property bool $isMan
 * @property bool $isWoman
 * @property bool $hasFaith
 * @property bool $onlySecondary
 * @property int $book
 * @method $this description(string $description)
 * @method $this isMan(bool $value = true)
 * @method $this isWoman(bool $value = true)
 * @method $this hasFaith(bool $value = true)
 * @method $this onlySecondary(bool $value = true)
 * @method $this book(int $bookId)
 */
class Profession extends Fluent
{

    public static function name(string $name): static
    {
        return new static(['name' => $name]);
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'man' => $this->isMan ?? false,
            'woman' => $this->isWoman ?? false,
            'has_faith' => $this->hasFaith ?? false,
            'only_secondary' => $this->onlySecondary ?? false,
            'book_id' => $this->book,
        ];
    }
}
