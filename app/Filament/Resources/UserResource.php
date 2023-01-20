<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\UserResource\Pages;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Users';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 1;

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected static ?string $recordTitleAttribute = 'name';

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Form')
                    ->schema([
                        TextInput::make('name')
                            ->minLength(2)
                            ->maxLength(255)
                            ->required(),
                        TextInput::make('email')
                            ->required()
                            ->email(),

                        TextInput::make('password')
                            ->password()
                            ->confirmed()
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $context): bool => $context === 'create'),
                        TextInput::make('password_confirmation'),
                    ])->columns(1),

                Section::make('Timestamps')
                    ->schema([
                        \RalphJSmit\Filament\Components\Forms\CreatedAt::make(),
                        \RalphJSmit\Filament\Components\Forms\UpdatedAt::make(),
                    ])
                    ->hiddenOn(Pages\CreateUser::class)
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                FilamentExportHeaderAction::make('export')
                    ->fileName('Users')
                    ->withHiddenColumns()
                    ->defaultPageOrientation('landscape')
                    ->disableAdditionalColumns(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
