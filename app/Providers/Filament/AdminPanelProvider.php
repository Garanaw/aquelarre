<?php

namespace App\Providers\Filament;

use App\Books\Application\BookRegistrar;
use App\Game\Core\Features\Characteristics\Application\CharacteristicsRegistrar;
use App\Game\Core\Features\Kingdom\Application\KingdomRegistrar;
use App\Game\Core\Features\Professions\Application\ProfessionRegistrar;
use App\Game\Core\Features\Rituals\RitualsRegistrar;
use App\Game\Core\Features\Skills\Application\SkillRegistrar;
use App\Game\Core\Features\Spells\SpellRegistrar;
use App\Shared\Filament\Panels\Concerns\RegistersDomains;
use App\User\Application\Middleware\CanSeeAdminPanel;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    use RegistersDomains;

    private const array REGISTRARS = [
        BookRegistrar::class,
        CharacteristicsRegistrar::class,
        SkillRegistrar::class,
        KingdomRegistrar::class,
        ProfessionRegistrar::class,
        SpellRegistrar::class,
        RitualsRegistrar::class,
    ];

    public function panel(Panel $panel): Panel
    {
        $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->pages([
                Dashboard::class,
            ])
            ->navigationItems([
                NavigationItem::make('user_panel')
                    ->label('User Panel')
                    ->url(fn () => Dashboard::getUrl(panel: 'user'))
                    ->icon('heroicon-o-user-circle')
                    ->group('Go to'),
            ])
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                CanSeeAdminPanel::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);

        return $this->registerDomains($panel, self::REGISTRARS);
    }
}
