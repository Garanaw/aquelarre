<?php

declare(strict_types=1);

namespace App\Game\Core\Features\SocialPosition\Infrastructure\Reader;

use App\Game\Core\Features\SocialPosition\Infrastructure\Collection\SocialPositions;
use App\Game\Core\Features\SocialPosition\Infrastructure\Models\SocialPosition;

class Reader
{
    public function __construct(
        private readonly SocialPosition $socialPosition,
    ) {
    }

    public function all(): SocialPositions
    {
        return $this->socialPosition->all();
    }
}
