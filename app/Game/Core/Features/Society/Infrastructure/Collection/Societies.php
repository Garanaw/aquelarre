<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Society\Infrastructure\Collection;

use App\Game\Core\Features\Society\Infrastructure\Models\Society;
use Illuminate\Database\Eloquent\Collection;

class Societies extends Collection
{
    public function christian(): Society
    {
        return $this->firstWhere('name', 'Cristiana');
    }

    public function jewish(): Society
    {
        return $this->firstWhere('name', 'Judía');
    }

    public function judaic(): Society
    {
        return $this->jewish();
    }

    public function muslim(): Society
    {
        return $this->firstWhere('name', 'Islámica');
    }

    public function islamic(): Society
    {
        return $this->muslim();
    }
}
