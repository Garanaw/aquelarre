<?php // phpcs:ignore SlevomatCodingStandard.TypeHints.DeclareStrictTypes.DeclareStrictTypesMissing -- baseline

return [
    'available_domains' => [
        // phpcs:ignore Squiz.Arrays.ArrayDeclaration.MultiLineNotAllowed -- baseline
        'core' => [
            'user',
        ],
    ],
    'core' => [
        'providers' => [
            Aquelarre\Core\Framework\Providers\AppServiceProvider::class,
            Aquelarre\Core\Framework\Providers\AuthServiceProvider::class,
            Aquelarre\Core\Framework\Providers\BladeServiceProvider::class,
            Aquelarre\Core\Framework\Providers\BroadcastServiceProvider::class,
            Aquelarre\Core\Framework\Providers\EventServiceProvider::class,
            Aquelarre\Core\Framework\Providers\RouteServiceProvider::class,
            Aquelarre\Core\Framework\Providers\TelescopeServiceProvider::class,
            Aquelarre\Core\Framework\Providers\ViewServiceProvider::class,
        ],
        // phpcs:ignore Squiz.Arrays.ArrayDeclaration.SpaceInEmptyArray -- baseline
        'exclude_for_other_domains' => [
        ],
    ],
    'user' => [
        'providers' => [
            Aquelarre\Core\User\Domain\Providers\BladeServiceProvider::class,
            Aquelarre\Core\User\Domain\Providers\FortifyServiceProvider::class,
            Aquelarre\Core\User\Domain\Providers\ViewServiceProvider::class,
        ],
    ],
];
