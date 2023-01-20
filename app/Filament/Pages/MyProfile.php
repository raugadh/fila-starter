<?php

namespace App\Filament\Pages;

use Filament\Forms;
use JeffGreco13\FilamentBreezy\Pages\MyProfile as BaseProfile;

class MyProfile extends BaseProfile
{
    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?int $navigationSort = 3;

    protected static function getNavigationGroup(): ?string
    {
        return 'Settings';
    }

    protected function getUpdateProfileFormSchema(): array
    {
        return array_merge(parent::getUpdateProfileFormSchema(), [
            // Forms\Components\TextInput::make('job_title'),

        ]);
    }
}
