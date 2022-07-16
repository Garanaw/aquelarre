<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition;

use Illuminate\Support\Collection;

class ChristianSocialPositions
{
    use FindsSocialPosition;

    public function __construct(
        private readonly Collection $socialPositions,
    ) {
    }

    public function highNoble(): int
    {
        return $this->socialPosition('alta nobleza');
    }

    public function lowNoble(): int
    {
        return $this->socialPosition('baja nobleza');
    }

    public function bourgeois(): int
    {
        return $this->socialPosition('burguesia');
    }

    public function villain(): int
    {
        return $this->socialPosition('villano');
    }

    public function fieldsman(): int
    {
        return $this->socialPosition('campesino');
    }

    public function slave(): int
    {
        return $this->socialPosition('esclavo');
    }
}
