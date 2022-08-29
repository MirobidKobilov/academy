<?php

namespace App\Filament\Resources\LandingPage;

use App\Filament\Resources\LandingPage\LandingHomeResource\Pages;
use App\Filament\Resources\LandingPage\LandingHomeResource\RelationManagers;
use App\Models\Landing\LandingHome;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class LandingHomeResource extends Resource
{
    protected static ?string $model = LandingHome::class;

    protected static ?string $navigationIcon = 'heroicon-o-template';
    protected static ?string $navigationGroup = 'Landing Page';
    protected static ?int $navigationSort = 1;

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
                        Tabs::make('')
                            ->tabs([
                                Tab::make('Контент 1')
                                    ->schema([
                                        TextInput::make('title'),
                                        Textarea::make('content'),
                                        FileUpload::make('hero_image'),
                                    ]),
                                Tab::make('Контент 2')
                                    ->schema([
                                        TextInput::make('title_2'),
                                        Textarea::make('content_2'),
                                        FileUpload::make('hero_image_2'),
                                    ])
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->limit(10),
                TextColumn::make('title_2')->limit(10),
                TextColumn::make('content')->limit(10),
                TextColumn::make('content_2')->limit(10),
                ImageColumn::make('hero_image'),
                ImageColumn::make('hero_image_2'),
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
            'index' => Pages\ListLandingHomes::route('/'),
            'create' => Pages\CreateLandingHome::route('/create'),
            'edit' => Pages\EditLandingHome::route('/{record}/edit'),
        ];
    }
}
