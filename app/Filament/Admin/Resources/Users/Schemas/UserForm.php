<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filafly\Icons\Phosphor\Enums\Phosphor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

final class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('avatar_url')
                    ->label('Avatar')
                    ->image()
                    ->imageEditor()
                    ->imagePreviewHeight('250')
                    ->panelAspectRatio('6:5')
                    ->panelLayout('integrated')
                    ->columnSpan('2'),
                Grid::make(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->minLength(2)
                            ->maxLength(255)
                            ->columnSpanFull(),
                        TextInput::make('email')
                            ->required()
                            ->prefixIcon(Phosphor::EnvelopeDuotone)
                            ->email()
                            ->columnSpanFull(),
                        TextInput::make('password')
                            ->password()
                            ->confirmed()
                            ->revealable()
                            ->prefixIcon(Phosphor::PasswordDuotone)
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->dehydrated(fn ($state): bool => filled($state))
                            ->required(fn (string $context): bool => $context === 'create')
                            ->columnSpan(1),
                        TextInput::make('password_confirmation')
                            ->required(fn (string $context): bool => $context === 'create')
                            ->password()
                            ->revealable()
                            ->prefixIcon(Phosphor::PasswordDuotone)
                            ->columnSpan(1),
                        Select::make('roles')
                            ->label('Roles')
                            ->relationship('roles', 'name')
                            ->prefixIcon(Phosphor::ShieldCheckDuotone)
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->required()
                            ->columnSpanFull(),
                    ])->columnSpan('4'),
            ])
            ->columns(6);
    }
}
