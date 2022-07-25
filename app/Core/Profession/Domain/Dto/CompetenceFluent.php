<?php

declare(strict_types=1);

namespace Aquelarre\Core\Profession\Domain\Dto;

use Aquelarre\Core\Competences\Domain\Enum\Order;
use Illuminate\Support\Fluent;

/**
 * @property int $profession
 * @property int $competence
 * @property int $order
 * @property bool $primary
 * @property int $quantity
 * @method CompetenceFluent competence(int $id)
 * @method CompetenceFluent primary()
 * @method CompetenceFluent secondary()
 * @method CompetenceFluent order(string $order)
 * @method CompetenceFluent quantity(int $quantity)
 */
class CompetenceFluent extends Fluent
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
            'competence_id' => $this->competence,
            'order' => $this->primary ? Order::PRIMARY->value : Order::SECONDARY->value,
            'quantity' => $this->quantity ?? 1,
        ];
    }
}
