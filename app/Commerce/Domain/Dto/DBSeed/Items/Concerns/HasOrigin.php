<?php

declare(strict_types=1);

namespace Aquelarre\Commerce\Domain\Dto\DBSeed\Items\Concerns;

trait HasOrigin
{
    public function origin(string $origin): self
    {
        $this->origin = $origin;
        return $this;
    }

    public function christian(): self
    {
        return $this->origin('cristiano');
    }

    public function muslim(): self
    {
        return $this->origin('musulmán');
    }

    public function jew(): self
    {
        return $this->origin('judío');
    }
}
