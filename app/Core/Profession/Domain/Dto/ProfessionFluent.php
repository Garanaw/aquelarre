<?php

declare(strict_types=1);

namespace Aquelarre\Core\Profession\Domain\Dto;

use Aquelarre\Core\Profession\Infrastructure\Models\Profession;
use Illuminate\Support\Fluent;

/**
 * @property string $name
 * @property string $description
 * @property bool $isMan
 * @property bool $isWoman
 * @property bool $hasFaith
 * @property bool $onlySecondary
 * @property int $book
 * @method static name(string $name)
 * @method static description(string $description)
 * @method static isMan(bool $value = true)
 * @method static isWoman(bool $value = true)
 * @method static hasFaith(bool $value = true)
 * @method static onlySecondary(bool $value = true)
 * @method static book(int $bookId)
 */
class ProfessionFluent extends Fluent
{
    public function __construct(iterable|Profession $attributes = [])
    {
        if ($attributes instanceof Profession) {
            $attributes = $attributes->toArray();
        }

        parent::__construct(attributes: $attributes);
    }

    public function isBoth(bool $value = true): static
    {
        return $this->isMan($value)->isWoman($value);
    }

    public static function make(string $name = null): static
    {
        return new static(
            attributes: $name ? ['name' => $name] : []
        );
    }

    public function toArray()
    {
        return $this->toDbData();
    }

    public function toDbData(): array
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
