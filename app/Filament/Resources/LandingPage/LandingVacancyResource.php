<?php

namespace App\Filament\Resources\LandingPage;

use App\Filament\Resources\LandingPage\LandingVacancyResource\Pages;
use App\Filament\Resources\LandingPage\LandingVacancyResource\RelationManagers;
use App\Models\Landing\LandingVacancy;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class LandingVacancyResource extends Resource
{
    protected static ?string $model = LandingVacancy::class;

    protected static ?string $navigationIcon = 'heroicon-o-template';
    protected static ?string $label = 'vacancies';
    protected static ?string $navigationGroup = 'vacancies';
    protected static ?int $navigationSort = 6;

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole('admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('title'),
                        TextInput::make('short_text'),
                        Textarea::make('description'),
                        FileUpload::make('image'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->limit(10),
                TextColumn::make('title')->limit(10),
                TextColumn::make('short_text')->limit(10),
                TextColumn::make('description')->limit(10),
                ImageColumn::make('image'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListLandingVacancies::route('/'),
            'create' => Pages\CreateLandingVacancy::route('/create'),
            'edit' => Pages\EditLandingVacancy::route('/{record}/edit'),
        ];
    }
}
