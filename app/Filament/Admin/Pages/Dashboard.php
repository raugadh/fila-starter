<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use ToneGabes\Filament\Icons\Enums\Phosphor;

final class Dashboard extends BaseDashboard
{
    protected static string|null|\UnitEnum $navigationGroup = 'General';

    protected static string|null|\BackedEnum $navigationIcon = Phosphor::HouseDuotone;
}
