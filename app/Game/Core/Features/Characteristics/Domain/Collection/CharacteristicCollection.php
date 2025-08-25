<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Characteristics\Domain\Collection;

use App\Game\Core\Features\Characteristics\Domain\Enum\Prefix;
use App\Game\Core\Features\Characteristics\Infrastructure\Models\Characteristic;
use Illuminate\Database\Eloquent\Collection;

class CharacteristicCollection extends Collection
{
    public function findByPrefix(Prefix $prefix): ?Characteristic
    {
        return $this->first(static fn (Characteristic $characteristic) => $characteristic->prefix->is($prefix));
    }

    public function culture(): Characteristic
    {
        return $this->findByPrefix(Prefix::CULTURE);
    }

    public function perception(): Characteristic
    {
        return $this->findByPrefix(Prefix::PERCEPTION);
    }

    public function agility(): Characteristic
    {
        return $this->findByPrefix(Prefix::AGILITY);
    }

    public function strength(): Characteristic
    {
        return $this->findByPrefix(Prefix::STRENGTH);
    }

    public function ability(): Characteristic
    {
        return $this->findByPrefix(Prefix::ABILITY);
    }

    public function communication(): Characteristic
    {
        return $this->findByPrefix(Prefix::COMMUNICATION);
    }

    public function aspect(): Characteristic
    {
        return $this->findByPrefix(Prefix::ASPECT);
    }
}
