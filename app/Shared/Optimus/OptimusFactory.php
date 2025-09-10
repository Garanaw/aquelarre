<?php

declare(strict_types=1);

namespace App\Shared\Optimus;

use InvalidArgumentException;
use Jenssegers\Optimus\Optimus;

class OptimusFactory
{
    public function make(array $config): Optimus
    {
        $config = $this->getConfig($config);

        return $this->getClient($config);
    }

    protected function getConfig(array $config): array
    {
        $prime = $config['prime'] ?? null;
        $inverse = $config['inverse'] ?? null;
        $random = $config['random'] ?? null;

        if (is_int($prime) === false) {
            throw new InvalidArgumentException(
                "Optimus `prime` value must be integer but `$prime` provided",
            );
        }
        if (is_int($prime) === false) {
            throw new InvalidArgumentException(
                "Optimus `inverse` value must be integer `$inverse` provided",
            );
        }
        if (is_int($random) === false) {
            throw new InvalidArgumentException(
                "Optimus `random` value must be integer `$random` provided",
            );
        }

        return [
            'prime' => $prime,
            'inverse' => $inverse,
            'random' => $random,
        ];
    }

    protected function getClient(array $config): Optimus
    {
        return new Optimus($config['prime'], $config['inverse'], $config['random']);
    }
}
