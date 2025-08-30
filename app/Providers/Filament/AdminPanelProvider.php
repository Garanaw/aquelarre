<?php

namespace App\Providers\Filament;

use App\Books\Application\BookRegistrar;
use App\Game\Core\Features\Characteristics\Application\CharacteristicsRegistrar;
use App\Game\Core\Features\Kingdom\Application\KingdomRegistrar;
use App\Game\Core\Features\Professions\Application\ProfessionRegistrar;
use App\Game\Core\Features\Skills\Application\SkillRegistrar;
use App\Game\Core\Features\Spells\SpellRegistrar;
use App\Shared\Filament\Registrar;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
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
    private const array REGISTRARS = [
        BookRegistrar::class,
        CharacteristicsRegistrar::class,
        SkillRegistrar::class,
        KingdomRegistrar::class,
        ProfessionRegistrar::class,
        SpellRegistrar::class,
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
            //->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            //->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            //->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
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
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);

        return $this->registerDomains($panel);
    }

    private function registerDomains(Panel $panel): Panel
    {
        return collect(self::REGISTRARS)
            ->map(fn (string $registrar): Registrar => resolve($registrar))
            ->reduce(
                static fn (Panel $panel, Registrar $registrar) => $registrar->register($panel),
                $panel,
            );
    }
}
