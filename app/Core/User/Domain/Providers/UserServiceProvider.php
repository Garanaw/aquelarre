<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Domain\Providers;

use Illuminate\Support\AggregateServiceProvider;

class UserServiceProvider extends AggregateServiceProvider
{
    /** @var string[] */
    protected $providers = [
        ViewServiceProvider::class,
    ];
}
