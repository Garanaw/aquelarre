<?php

declare(strict_types=1);

namespace Application\User\Middleware;

use Application\Shared\Middleware\ServiceProviderLoader as BaseServiceProviderLoader;
use Illuminate\Support\Collection;


class ServiceProviderLoader extends BaseServiceProviderLoader
{
    protected function getProviders(): Collection
    {
        return Collection::wrap(
            $this->app['config']->get('domain.user.providers', [])
        )->merge(
            parent::getProviders()
        );
    }
}
