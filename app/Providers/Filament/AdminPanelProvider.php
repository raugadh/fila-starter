<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use App\Filament\Admin\Resources\Users\UserResource;
use App\Filament\Admin\Widgets\LatestAccessLogs;
use App\Models\User;
use Awcodes\LightSwitch\Enums\Alignment;
use Awcodes\LightSwitch\LightSwitchPlugin;
use Awcodes\Overlook\OverlookPlugin;
use Awcodes\Overlook\Widgets\OverlookWidget;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Boquizo\FilamentLogViewer\FilamentLogViewerPlugin;
use DiogoGPinto\AuthUIEnhancer\AuthUIEnhancerPlugin;
use DutchCodingCompany\FilamentDeveloperLogins\FilamentDeveloperLoginsPlugin;
use Filafly\Icons\Phosphor\Enums\Phosphor;
use Filafly\Icons\Phosphor\PhosphorIcons;
use Filafly\Themes\Brisk\BriskTheme;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;

final class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->authGuard('web')
            ->login()
            ->defaultThemeMode(ThemeMode::Light)
            ->colors([
                'primary' => Color::Blue,
            ])
            ->maxContentWidth('7xl')
            ->sidebarCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Admin/Resources'), for: 'App\Filament\Admin\Resources')
            ->discoverPages(in: app_path('Filament/Admin/Pages'), for: 'App\Filament\Admin\Pages')
            ->pages([
                //
            ])
            ->discoverWidgets(in: app_path('Filament/Admin/Widgets'), for: 'App\Filament\Admin\Widgets')
            ->widgets([
                OverlookWidget::class,
                LatestAccessLogs::class,
            ])
            ->navigationGroups([
                NavigationGroup::make()
                    ->collapsed(true)
                    ->label('General'),
                NavigationGroup::make()
                    ->collapsed(true)
                    ->label('Administration'),
            ])
            ->plugins([
                BriskTheme::make(),
                PhosphorIcons::make()->duotone(),
                LightSwitchPlugin::make()
                    ->position(Alignment::BottomCenter)
                    ->enabledOn([
                        'auth.login',
                    ]),
                AuthUIEnhancerPlugin::make()
                    ->showEmptyPanelOnMobile(false)
                    ->formPanelPosition('right')
                    ->formPanelWidth('40%')
                    ->emptyPanelBackgroundImageOpacity('70%')
                    ->emptyPanelBackgroundImageUrl('https://images.pexels.com/photos/466685/pexels-photo-466685.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'),
                BreezyCore::make()
                    ->myProfile(
                        hasAvatars: true,
                        slug: 'profile',
                        userMenuLabel: 'Profile',
                    )
                    ->enableBrowserSessions(),
                OverlookPlugin::make()
                    ->sort(2)
                    ->columns([
                        'default' => 4,
                        'sm' => 2,
                        'lg' => 4,
                        'xl' => 6,
                    ])
                    ->includes([
                        UserResource::class,
                    ]),
                FilamentShieldPlugin::make()
                    ->gridColumns([
                        'default' => 2,
                    ])
                    ->sectionColumnSpan(1)
                    ->checkboxListColumns([
                        'default' => 2,
                    ])
                    ->resourceCheckboxListColumns([
                        'default' => 2,
                    ])
                    ->navigationLabel('Roles & Permissions')
                    ->navigationGroup('Administration')
                    ->navigationSort(2)
                    ->navigationIcon(Phosphor::ShieldCheckDuotone),
                FilamentLogViewerPlugin::make()
                    ->navigationGroup('Administration')
                    ->navigationSort(4)
                    ->navigationIcon(Phosphor::FileArchiveDuotone),
                FilamentDeveloperLoginsPlugin::make()
                    ->enabled(app()->environment('local'))
                    ->switchable(true)
                    ->users(fn () => User::pluck('email', 'name')->toArray()),
            ])
            ->resources([
                config('filament-logger.activity_resource'),
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
            ])
            ->viteTheme('resources/css/filament/admin/theme.css');
    }
}
