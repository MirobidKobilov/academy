<?php

namespace App\Filament\Resources\LandingPage;

use App\Filament\Resources\LandingPage\LandingAboutResource\Pages;
use App\Filament\Resources\LandingPage\LandingAboutResource\RelationManagers;
use App\Models\Landing\LandingAbout;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class LandingAboutResource extends Resource
{
    protected static ?string $model = LandingAbout::class;

    protected static ?string $navigationIcon = 'heroicon-o-template';
    protected static ?string $navigationGroup = 'Landing Page';
    protected static ?int $navigationSort = 2;

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
                        TextInput::make('about_title'),
                        TextInput::make('about_short'),
                        Textarea::make('about_desc'),
                        FileUpload::make('about_bg'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('about_title')->limit(10),
                TextColumn::make('about_short')->limit(10),
                TextColumn::make('about_desc')->limit(10),
                ImageColumn::make('about_bg')
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
            'index' => Pages\ListLandingAbouts::route('/'),
            'create' => Pages\CreateLandingAbout::route('/create'),
            'edit' => Pages\EditLandingAbout::route('/{record}/edit'),
        ];
    }
}
