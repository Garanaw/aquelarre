<?php

declare(strict_types=1);

namespace Aquelarre\Core\People\Domain\Dto;

use Illuminate\Support\Fluent;

/**
 * @property int $people
 * @property int $language
 * @method static language(int $id)
 * @method static points(?int $id)
 * @method static cul(?int $id)
 */
class PeopleLanguageFluent extends Fluent
{
    public function toArray()
    {
        return [
            'people_id' => $this->people,
            'competence_id' => $this->language,
            'points' => $this->points ?? null,
            'cul' => $this->cul ?? null,
        ];
    }

    public static function people(int $people): self
    {
        $fluent = new self();
        $fluent->people = $people;

        return $fluent;
    }
}
