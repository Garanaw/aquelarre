<?php

declare(strict_types=1);

namespace Aquelarre\Core\Profession\Domain\Dto;

use Illuminate\Support\Fluent;

/**
 * @method static society(int $society)
 * @method static socialPosition(int $socialPosition)
 * @property int $profession
 * @property int $society
 * @property int $socialPosition
 */
class SocialPositionFluent extends Fluent
{
    public static function profession(int $profession): self
    {
        return new static([
            'profession' => $profession,
        ]);
    }

    /** @inheritDoc */
    public function toArray()
    {
        return [
            'profession_id' => $this->profession,
            'society_id' => $this->society,
            'social_position_id' => $this->socialPosition,
        ];
    }
}
