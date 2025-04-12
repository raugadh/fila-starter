<?php

namespace App\Filament\Admin\Widgets;

use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;

class LatestAccessLogs extends BaseWidget
{
    use HasWidgetShield;
    protected static ?int $sort = 100;

    protected int|string|array $columnSpan = 2;

    protected static function getLogNameColors(): array
    {
        $customs = [];

        foreach (config('filament-logger.custom') ?? [] as $custom) {
            if (filled($custom['color'] ?? null)) {
                $customs[$custom['color']] = $custom['log_name'];
            }
        }

        return array_merge(
            (config('filament-logger.resources.enabled') && config('filament-logger.resources.color')) ? [
                config('filament-logger.resources.color') => config('filament-logger.resources.log_name'),
            ] : [],
            (config('filament-logger.models.enabled') && config('filament-logger.models.color')) ? [
                config('filament-logger.models.color') => config('filament-logger.models.log_name'),
            ] : [],
            (config('filament-logger.access.enabled') && config('filament-logger.access.color')) ? [
                config('filament-logger.access.color') => config('filament-logger.access.log_name'),
            ] : [],
            (config('filament-logger.notifications.enabled') && config('filament-logger.notifications.color')) ? [
                config('filament-logger.notifications.color') => config('filament-logger.notifications.log_name'),
            ] : [],
            $customs,
        );
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Activity::query()->latest()->take(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('log_name')
                    ->badge()
                    ->colors(static::getLogNameColors())
                    ->label(__('filament-logger::filament-logger.resource.label.type'))
                    ->formatStateUsing(fn ($state) => ucwords($state))
                    ->sortable(),
                Tables\Columns\TextColumn::make('event')
                    ->label(__('filament-logger::filament-logger.resource.label.event'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label(__('filament-logger::filament-logger.resource.label.description'))
                    ->wrap(),

                Tables\Columns\TextColumn::make('subject_type')
                    ->label(__('filament-logger::filament-logger.resource.label.subject'))
                    ->formatStateUsing(function ($state, Model $record) {
                        /** @var Activity $record */
                        if (! $state) {
                            return '-';
                        }

                        return Str::of($state)->afterLast('\\')->headline() . ' # ' . $record->subject_id;
                    }),

                Tables\Columns\TextColumn::make('causer.name')
                    ->label(__('filament-logger::filament-logger.resource.label.user')),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament-logger::filament-logger.resource.label.logged_at'))
                    ->dateTime(config('d/m/Y H:i A'))
                    ->sortable(),
            ])
            ->paginated(false);
    }
}
