<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Users\Tables;

use Filafly\Icons\Phosphor\Enums\Phosphor;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

final class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Split::make([
                    Tables\Columns\TextColumn::make('id')
                        ->grow(false)
                        ->sortable()
                        ->searchable(),
                    Tables\Columns\ImageColumn::make('avatar_url')
                        ->defaultImageUrl(url('https://www.gravatar.com/avatar/64e1b8d34f425d19e1ee2ea7236d3028?d=mp&r=g&s=250'))
                        ->label('Avatar')
                        ->alignEnd()
                        ->square()
                        ->grow(false),
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('name')
                            ->copyable()
                            ->sortable()
                            ->searchable(),
                        Tables\Columns\TextColumn::make('email')
                            ->copyable()
                            ->sortable()
                            ->icon(Phosphor::EnvelopeDuotone)
                            ->searchable(),
                    ])
                        ->alignStart(),
                    Tables\Columns\TextColumn::make('roles.name')
                        ->badge()
                        ->weight(FontWeight::Bold)
                        ->formatStateUsing(fn (string $state): string => Str::title(str_replace('_', ' ', $state)))
                        ->sortable()
                        ->searchable(),

                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('updated_at')
                            ->since()
                            ->icon(Phosphor::CalendarBlankDuotone)
                            ->sortable()
                            ->searchable(),
                        Tables\Columns\TextColumn::make('created_at')
                            ->date()
                            ->icon(Phosphor::CalendarBlankDuotone)
                            ->sortable()
                            ->searchable(),
                    ])
                        ->alignEnd()
                        ->grow(false),
                ]),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()->label(''),
                EditAction::make()->label(''),
                DeleteAction::make()->label(''),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
