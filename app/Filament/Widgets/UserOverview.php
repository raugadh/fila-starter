<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class UserOverview extends BaseWidget
{
    protected int|string|array $columnSpan = 1;

    protected function getColumns(): int
    {
        return 3;
    }
    protected function getCards(): array
    {
        return [
            Card::make('Users', User::count())
                ->descriptionIcon('heroicon-s-user'),
        ];
    }
}
