<?php

declare(strict_types=1);

namespace App\Game\Core\Features\SocialPosition\Infrastructure\Collection;

use App\Game\Core\Features\SocialPosition\Infrastructure\Models\SocialPosition;
use Illuminate\Database\Eloquent\Collection;

class SocialPositions extends Collection
{
    public function christian(): static
    {
        return $this->loadMissing('society')->filter(
            fn (SocialPosition $position) => $position->society->isChristian()
        );
    }

    public function jewish(): static
    {
        return $this->loadMissing('society')->filter(
            fn (SocialPosition $position) => $position->society->isJewish()
        );
    }

    public function judaic(): static
    {
        return $this->jewish();
    }

    public function muslim(): static
    {
        return $this->loadMissing('society')->filter(
            fn (SocialPosition $position) => $position->society->isMuslim()
        );
    }

    public function islamic(): static
    {
        return $this->muslim();
    }

    public function pagan(): static
    {
        return $this->loadMissing('society')->filter(
            fn (SocialPosition $position) => $position->society->isPagan()
        );
    }

    public function highNoble(): ?SocialPosition
    {
        return $this->firstWhere('name', '=', 'Alta Nobleza');
    }

    public function lowNoble(): ?SocialPosition
    {
        return $this->firstWhere('name', '=', 'Baja Nobleza');
    }

    public function fieldsman(): ?SocialPosition
    {
        return $this->firstWhere('name', '=', 'Campesino');
    }
}
