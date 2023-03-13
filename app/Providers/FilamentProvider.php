<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;

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
            Page::$reportValidationErrorUsing = function (ValidationException $exception) {
                Notification::make()
                    ->title($exception->getMessage())
                    ->danger()
                    ->send();
            };

            Filament::registerUserMenuItems([

                'account' => UserMenuItem::make()->url(route('filament.pages.my-profile')),

            ]);

            \Z3d0X\FilamentLogger\Resources\ActivityResource::navigationSort(3);

            Filament::registerNavigationGroups([
                'Settings',
            ]);
        });
    }
}
