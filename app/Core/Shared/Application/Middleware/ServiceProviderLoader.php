<?php

declare(strict_types=1);

namespace Aquelarre\Core\Shared\Application\Middleware;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

class ServiceProviderLoader
{
    final protected const DOMAIN_NAME = 'core';

    public function __construct(protected readonly Application $app)
    {
    }

    public function handle(Request $request, \Closure $next): Response
    {
        $this->getProviders()->each(
            callback: fn (string $provider) => $this->app->register(provider: $provider)
        );

        return $next($request);
    }

    protected function getProviders(): Collection
    {
        return Collection::wrap(
            value: $this->app['config']->get(
                key: sprintf('domain.%s.providers', self::DOMAIN_NAME),
                default: []
            )
        );
    }

    protected function getCoreDomainName(): string
    {
        return self::DOMAIN_NAME;
    }
}
