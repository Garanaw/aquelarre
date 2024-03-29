<?php

declare(strict_types=1);

namespace Aquelarre\Character\Application\Middleware;

use Aquelarre\Core\Shared\Application\Middleware\ServiceProviderLoader as BaseServiceProviderLoader;
use Illuminate\Support\Collection;

class ServiceProviderLoader extends BaseServiceProviderLoader
{
    final protected const DOMAIN = 'character';

    protected function getProviders(): Collection
    {
        $config = $this->app['config']->get('domain');
        $selfProviders = $config[self::DOMAIN]['providers'];
        $excluded = $config[self::DOMAIN_NAME]['exclude_for_other_domains'];
        $sharedProviders = parent::getProviders()->reject(
            callback: static fn(string $provider) => in_array($provider, $excluded)
        );

        return $sharedProviders->merge($selfProviders);
    }
}
