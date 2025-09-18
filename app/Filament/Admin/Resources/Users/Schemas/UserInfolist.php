<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filafly\Icons\Phosphor\Enums\Phosphor;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

final class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('avatar_url')
                    ->label('Avatar')
                    ->defaultImageUrl(function ($record) {
                        $hash = md5(mb_strtolower(mb_trim($record->email)));

                        return 'https://www.gravatar.com/avatar/'.$hash.'?d=mp&r=g&s=250';
                    })
                    ->columnSpan(1),
                Grid::make(3)
                    ->schema([
                        TextEntry::make('name')
                            ->columnSpan('2'),
                        TextEntry::make('roles.name')
                            ->label('Roles')
                            ->badge()
                            ->icon(Phosphor::ShieldCheckDuotone)
                            ->placeholder('-')
                            ->columnSpan('1'),
                        TextEntry::make('email')
                            ->label('Email address')
                            ->icon(Phosphor::EnvelopeDuotone)
                            ->columnSpanFull(),
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('created_at')
                                    ->dateTime()
                                    ->placeholder('-')
                                    ->icon(Phosphor::CalendarBlankDuotone)
                                    ->columnSpan(1),
                                TextEntry::make('updated_at')
                                    ->dateTime()
                                    ->placeholder('-')
                                    ->icon(Phosphor::CalendarBlankDuotone)
                                    ->columnSpan(1),
                            ])->columnSpanFull(),
                    ])->columnSpan('5'),
            ])->columns(6);
    }
}
