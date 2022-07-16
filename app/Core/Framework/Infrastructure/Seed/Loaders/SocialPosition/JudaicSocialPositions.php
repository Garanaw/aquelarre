<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition;

use Illuminate\Support\Collection;

class JudaicSocialPositions
{
    use FindsSocialPosition;

    public function __construct(
        private readonly Collection $socialPositions,
    ) {
    }

    public function bourgeois(): int
    {
        return $this->socialPosition('burguesia');
    }

    public function villain(): int
    {
        return $this->socialPosition('villano');
    }
}
