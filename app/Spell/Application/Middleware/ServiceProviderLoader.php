<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Application\Middleware;

use Aquelarre\Core\Shared\Application\Middleware\ProvidesServiceProviders;
use Aquelarre\Core\Shared\Application\Middleware\ServiceProviderLoader as BaseServiceProviderLoader;
use Illuminate\Support\Collection;

class ServiceProviderLoader extends BaseServiceProviderLoader
{
    use ProvidesServiceProviders;

    final protected const DOMAIN = 'spell';

    protected function getProviders(): Collection
    {
        $config = $this->app['config']->get('domain');

        return $this->prepareServiceProviders(
            domainConfig: $config,
            sharedProviders: parent::getProviders(),
            domainName: self::DOMAIN,
            coreDomainName: $this->getCoreDomainName()
        );
    }
}
