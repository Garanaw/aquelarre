<?php

declare(strict_types=1);

namespace Aquelarre\Core\Profession\Domain\Dto;

use Aquelarre\Core\Competences\Domain\Enum\Order;
use Illuminate\Support\Fluent;

/**
 * @method WeaponFluent quantity(int $quantity)
 * @method WeaponFluent primary()
 * @method WeaponFluent villain()
 * @method WeaponFluent soldier()
 * @method WeaponFluent noble()
 * @property int $profession
 * @property int $quantity
 * @property ?bool $primary
 * @property ?bool $villain
 * @property ?bool $soldier
 * @property ?bool $noble
 */
class WeaponFluent extends Fluent
{
    public static function profession(int $id): self
    {
        return new self(['profession' => $id]);
    }

    /** @inheritDoc */
    public function toArray()
    {
        return [
            'profession_id' => $this->profession,
            'quantity' => $this->quantity ?? 1,
            'order' => $this->primary ? Order::PRIMARY->value : Order::SECONDARY->value,
            'villain' => $this->villain ?? false,
            'soldier' => $this->soldier ?? false,
            'noble' => $this->noble ?? false,
        ];
    }
}
