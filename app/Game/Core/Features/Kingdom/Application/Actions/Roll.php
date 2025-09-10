<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Kingdom\Application\Actions;

use App\Game\Core\Features\Kingdom\Application\Responses\KingdomResponse;
use App\Game\Core\Features\Kingdom\Domain\Reader\Reader;
use Illuminate\Contracts\Support\Responsable;

class Roll
{
    public function __invoke(
        Reader $reader,
        KingdomResponse $response,
    ): Responsable {
        return $response->make($reader->roll());
    }
}
