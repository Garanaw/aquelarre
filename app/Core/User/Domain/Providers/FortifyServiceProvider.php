<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Domain\Providers;

use Application\User\Actions\CreateNewUser;
use Application\User\Actions\ResetUserPassword;
use Application\User\Actions\UpdateUserPassword;
use Application\User\Actions\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->defineActions();
        $this->defineRateLimits();
        $this->defineViews();

    }

    private function defineActions(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
    }

    private function defineRateLimits(): void
    {
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }

    private function defineViews(): void
    {
        Fortify::loginView('user::login');
        Fortify::registerView('user::register');
    }
}
