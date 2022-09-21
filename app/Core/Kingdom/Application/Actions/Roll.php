<?php

declare(strict_types=1);

namespace Aquelarre\Core\Kingdom\Application\Actions;

use Aquelarre\Core\Kingdom\Application\Responses\ItemResponse;
use Aquelarre\Core\Kingdom\Domain\Services\Reader;

class Roll
{
    public function __invoke(Reader $reader): ItemResponse
    {
        return new ItemResponse(
            item: $reader->rollKingdom()
        );
    }
}
