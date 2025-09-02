<?php

declare(strict_types=1);

namespace App\Game\Core\Features\SocialPosition\Domain\Reader;

use App\Game\Core\Features\SocialPosition\Infrastructure\Collection\SocialPositions;
use App\Game\Core\Features\SocialPosition\Infrastructure\Reader\Reader as SocialPosition;

class Reader
{
    public function __construct(
        private readonly SocialPosition $reader,
    ) {
    }

    public function all(): SocialPositions
    {
        return $this->reader->all();
    }
}
