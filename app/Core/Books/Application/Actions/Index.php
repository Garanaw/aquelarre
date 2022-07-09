<?php

declare(strict_types=1);

namespace Aquelarre\Core\Books\Application\Actions;

use Aquelarre\Core\Books\Domain\Services\Reader;

class Index
{
    // phpcs:disable
    public function __invoke(Reader $reader): never
    {
        dd('not implemented yet');
    }
}
