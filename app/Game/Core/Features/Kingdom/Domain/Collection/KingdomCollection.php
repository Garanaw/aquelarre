<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Kingdom\Domain\Collection;

use App\Game\Core\Features\Kingdom\Infrastructure\Models\Kingdom;
use Illuminate\Database\Eloquent\Collection;

class KingdomCollection extends Collection
{
    public function firstByName(string $name): Kingdom
    {
        return $this->first(
            static fn (Kingdom $kingdom) => $kingdom->name->studly()->is(str($name)->studly())
        );
    }

    public function castilla(): Kingdom
    {
        return $this->firstByName(name: 'Corona de Castilla');
    }

    public function aragon(): Kingdom
    {
        return $this->firstByName('corona de aragón');
    }

    public function granada(): Kingdom
    {
        return $this->firstByName('reino de granada');
    }

    public function navarra(): Kingdom
    {
        return $this->firstByName('reino de navarra');
    }

    public function portugal(): Kingdom
    {
        return $this->firstByName('reino de portugal');
    }
}
