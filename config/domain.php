<?php

declare(strict_types=1);

return [
    'available_domains' => [
        'core' => [
            'books',
            'characteristics',
            'competences',
            'familiarSituation',
            'framework',
            'kingdom',
            'people',
            'profession',
            'rituals',
            'shared',
            'socialPosition',
            'society',
            'theology',
            'user',
        ],
        // phpcs:ignore Squiz.Arrays.ArrayDeclaration.NoKeySpecified -- baseline
        'static',
        'character',
        'spell',
    ],
    'core' => [
        'providers' => [
            Aquelarre\Core\Framework\Providers\AppServiceProvider::class,
            Aquelarre\Core\Framework\Providers\AuthServiceProvider::class,
            Aquelarre\Core\Framework\Providers\BroadcastServiceProvider::class,
            Aquelarre\Core\Framework\Providers\EventServiceProvider::class,
            Aquelarre\Core\Framework\Providers\RouteServiceProvider::class,
            Aquelarre\Core\Framework\Providers\TelescopeServiceProvider::class,
            Aquelarre\Core\Framework\Providers\ViewServiceProvider::class,
        ],
        'exclude_for_other_domains' => [],
    ],
    'user' => [
        'providers' => [
            Aquelarre\Core\User\Domain\Providers\FortifyServiceProvider::class,
            Aquelarre\Core\User\Domain\Providers\ViewServiceProvider::class,
        ],
        'routes' => [],
    ],
    'books' => [
        'providers' => [
            Aquelarre\Core\Books\Domain\Providers\ViewServiceProvider::class,
        ],
        'routes' => [
            'file' => 'app/Core/Books/Application/routes.php',
            'prefix' => 'books',
            'middleware' => Aquelarre\Core\Books\Application\Middleware\ServiceProviderLoader::class,
        ],
    ],
    'kingdom' => [
        'providers' => [],
        'routes' => [
            'file' => 'app/Core/Kingdom/routes.php',
            'prefix' => 'kingdom',
            'middleware' => Aquelarre\Core\Kingdom\Application\Middleware\ServiceProviderLoader::class,
        ],
    ],
    'static' => [
        'providers' => [
            Aquelarre\Static\Domain\Providers\ViewServiceProvider::class,
        ],
        'routes' => [
            'file' => 'app/Static/Application/routes.php',
            // 'prefix' => null,
            'middleware' => Aquelarre\Static\Application\Middleware\ServiceProviderLoader::class,
        ],
    ],
    'character' => [
        'providers' => [
            Aquelarre\Character\Domain\Providers\ViewServiceProvider::class,
        ],
        'prefix' => 'character',
        'routes' => [
            'file' => 'app/Character/Application/routes.php',
            'prefix' => 'character',
            'middleware' => Aquelarre\Character\Application\Middleware\ServiceProviderLoader::class,
        ],
    ],
    'spell' => [
        'providers' => [
            Aquelarre\Spell\Domain\Providers\SpellServiceProvider::class,
        ],
        'prefix' => 'spell',
        'routes' => [
            'file' => 'app/Spell/Application/routes.php',
            'prefix' => 'spell',
            'middleware' => Aquelarre\Spell\Application\Middleware\ServiceProviderLoader::class,
        ],
    ],
];
