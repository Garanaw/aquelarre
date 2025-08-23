<?php

declare(strict_types=1);

namespace App\Providers;

use App\Permission\Infrastructure\Models\Permission;
use App\Permission\Infrastructure\Models\Role;
use App\User\Infrastructure\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class EloquentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Model::shouldBeStrict();

        Relation::enforceMorphMap([
            'user' => User::class,
            'role' => Role::class,
            'permission' => Permission::class,
        ]);
    }
}
