<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders;

use Illuminate\Support\Collection;

interface Loader
{
    public function load(): Collection;
}
