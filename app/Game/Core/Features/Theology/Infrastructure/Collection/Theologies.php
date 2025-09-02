<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Theology\Infrastructure\Collection;

use App\Game\Core\Features\Theology\Infrastructure\Models\Theology;
use Illuminate\Database\Eloquent\Collection;

class Theologies extends Collection
{
    public function getByName(string $name): Theology
    {
        return $this->firstWhere('name', $name);
    }

    public function cristianism(): Theology
    {
        return $this->getByName(name: 'Cristianismo');
    }

    public function judaism(): Theology
    {
        return $this->getByName(name: 'Judaísmo');
    }

    public function islam(): Theology
    {
        return $this->getByName(name: 'Islamismo');
    }

    public function paganism(): Theology
    {
        return $this->getByName(name: 'Paganismo');
    }
}
