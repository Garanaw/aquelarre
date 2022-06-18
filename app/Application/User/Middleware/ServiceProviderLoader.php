<?php

declare(strict_types=1);

namespace Application\User\Middleware;

use Application\Shared\Middleware\ServiceProviderLoader as BaseServiceProviderLoader;
use Illuminate\Support\Collection;

class ServiceProviderLoader extends BaseServiceProviderLoader
{
    protected function getProviders(): Collection
    {
        $config = $this->app['config']->get('domain');
        $selfProviders = $config['user']['providers'];
        $excluded = $config['shared']['exclude_for_other_domains'];
        $sharedProviders = parent::getProviders()->reject(
            fn(string $provider) => in_array($provider, $excluded)
        );

        return $sharedProviders->merge($selfProviders);
    }
}
