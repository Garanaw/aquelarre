<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed;

use Aquelarre\Commerce\Enum\Currency;
use Illuminate\Support\Fluent;

/**
 * @property int $item_id
 * @property int $amount
 * @property string $currency
 * @property ?string $description
 */
class Price extends Fluent
{
    public static function ofItem(int $itemId): static
    {
        return new static([
            'item_id' => $itemId,
            'amount' => 0,
            'currency' => Currency::MARAVEDI->value,
            'description' => null,
        ]);
    }

    public function amount(int $amount): static
    {
        $this->amount = $amount;
        return $this;
    }

    public function dineros(): static
    {
        $this->currency = Currency::DINEROS->value;
        return $this;
    }

    public function description(string $description): static
    {
        $this->description = $description;
        return $this;
    }
}
