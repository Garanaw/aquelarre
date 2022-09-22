<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Domain\Concerns;

use Jenssegers\Optimus\Optimus;

trait EncodesIds
{
    protected function encode(int $id): int
    {
        return app(Optimus::class)->encode($id);
    }

    protected function decode(int $id): int
    {
        return app(Optimus::class)->decode($id);
    }
}
