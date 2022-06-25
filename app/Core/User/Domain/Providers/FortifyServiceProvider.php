<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Domain\Providers;

use Aquelarre\Core\User\Application\Actions\CreateNewUser;
use Aquelarre\Core\User\Application\Actions\ResetUserPassword;
use Aquelarre\Core\User\Application\Actions\UpdateUserPassword;
use Aquelarre\Core\User\Application\Actions\UpdateUserProfileInformation;
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
        RateLimiter::for('login', static function (Request $request) {
            $email = (string) $request->email;

            // phpcs:ignore Squiz.Strings.ConcatenationSpacing.PaddingFound -- baseline
            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', static function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }

    private function defineViews(): void
    {
        Fortify::loginView('user::login');
        Fortify::registerView('user::register');
    }
}
