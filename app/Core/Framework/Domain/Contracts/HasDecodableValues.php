<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Domain\Contracts;

/**
 * @deprecated Until jenssegers/optimus is updated to support PHP 8.2
 */
interface HasDecodableValues
{
    public function getDecodableKeys(): array;

    public function decodeValues(array $values): array;
}
