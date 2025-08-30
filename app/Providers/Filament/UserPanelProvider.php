<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use App\Books\Application\BookRegistrar;
use App\Permission\Domain\Enum\Permission;
use App\Shared\Filament\Panels\Concerns\RegistersDomains;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class UserPanelProvider extends PanelProvider
{
    use RegistersDomains;

    private const array REGISTRARS = [
        BookRegistrar::class,
    ];

    public function panel(Panel $panel): Panel
    {
        $panel
            ->id('user')
            ->path('user')
            ->login()
            ->colors([
                'primary' => Color::Red,
            ])->pages([
                Dashboard::class,
            ])->navigationItems([
                NavigationItem::make('admin_panel')
                    ->label('Admin Panel')
                    ->url(fn () => Dashboard::getUrl(panel: 'admin'))
                    ->icon('heroicon-o-cog')
                    ->visible(fn () => auth()->user()?->can(Permission::ADMIN_DASHBOARD_VIEW) ?? false),
            ])->widgets([
                AccountWidget::class,
            ])->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ]);

        return $this->registerDomains($panel, self::REGISTRARS);
    }
}
