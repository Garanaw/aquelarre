<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Form\Domain\Readers;

use App\Game\Core\Features\Spells\Form\Infrastructure\Collection\FormCollection;
use App\Game\Core\Features\Spells\Form\Infrastructure\Readers\Reader as DbReader;

class Reader
{
    public function __construct(
        private readonly DbReader $reader,
    ) {
    }

    public function all(): FormCollection
    {
        return $this->reader->all();
    }
}
