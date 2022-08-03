<?php

declare(strict_types=1);

namespace Aquelarre\Core\Profession\Domain\Dto;

use Aquelarre\Core\Framework\Domain\Enum\Multiplier; // phpccs:ignore-line
use Aquelarre\Core\Framework\Domain\Enum\Operation; // phpcs-ignore-line
use Illuminate\Support\Fluent;

/**
 * @method static socialPosition(int $value)
 * @method static title(int $value)
 * @method static maravedies(int $value)
 * @method static characteristic(int $value)
 * @method static firstCompetence(int $value)
 * @method static secondCompetence(int $value)
 * @method static thirdCompetence(int $value)
 * @method static operation(Operation $value)
 * @method static multiplier(Multiplier $value)
 * @property int $profession
 * @property int $socialPosition
 * @property ?int $title
 * @property ?int $maravedies
 * @property ?int $characteristic
 * @property ?int $firstCompetence
 * @property ?int $secondCompetence
 * @property ?int $thirdCompetence
 * @property ?Operation $operation
 * @property ?Multiplier $multiplier
 */
class WageFluent extends Fluent
{
    public static function from(int $professionId): self
    {
        return new static([
            'profession' => $professionId,
        ]);
    }

    /** @inheritDoc */
    public function toArray()
    {
        return [
            'profession_id' => $this->profession,
            'social_position_id' => $this->socialPosition,
            'title_id' => $this->title ?? null,
            'maravedies' => $this->maravedies ?? null,
            'characteristic_id' => $this->characteristic ?? null,
            'first_competence_id' => $this->firstCompetence ?? null,
            'second_competence_id' => $this->secondCompetence ?? null,
            'third_competence_id' => $this->thirdCompetence ?? null,
            'operation' => $this->operation?->value,
            'multiplier' => $this->multiplier?->value,
        ];
    }
}
