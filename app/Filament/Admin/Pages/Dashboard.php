<?php

declare(strict_types=1);

namespace App\Filament\Admin\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use UnitEnum;

final class Dashboard extends BaseDashboard
{
    protected static string|null|UnitEnum $navigationGroup = 'General';

    protected static bool $shouldRegisterNavigation = false;
}
