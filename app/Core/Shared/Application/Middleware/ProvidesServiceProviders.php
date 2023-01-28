<?php

declare(strict_types=1);

namespace Aquelarre\Core\Shared\Application\Middleware;

use Illuminate\Support\Collection;

trait ProvidesServiceProviders
{
    protected function prepareServiceProviders(
        array $domainConfig,
        Collection $sharedProviders,
        string $domainName,
        string $coreDomainName
    ): Collection {
        $selfProviders = $domainConfig[$domainName]['providers'];
        $excluded = $domainConfig[$coreDomainName]['exclude_for_other_domains'];
        $sharedProviders = $sharedProviders->reject(
            callback: static fn(string $provider) => in_array($provider, $excluded)
        );

        return $sharedProviders->merge($selfProviders);
    }
}
