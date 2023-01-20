<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Foundation\Vite;
use Illuminate\Support\ServiceProvider;

class FilamentProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {
            // Using Vite
            Filament::registerViteTheme('resources/css/filament.css');

            Filament::registerUserMenuItems([

                'account' => UserMenuItem::make()->url(route('filament.pages.my-profile')),

            ]);

            \Z3d0X\FilamentLogger\Resources\ActivityResource::navigationSort(2);
            Filament::registerNavigationGroups([
                'Settings',
            ]);
        });
    }
}
