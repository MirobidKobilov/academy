<?php

namespace App\Filament\Resources\LandingPage;

use App\Filament\Resources\LandingPage\LandingPriceResource\Pages;
use App\Filament\Resources\LandingPage\LandingPriceResource\RelationManagers;
use App\Models\Landing\LandingPrice;
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
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class LandingPriceResource extends Resource
{
    protected static ?string $model = LandingPrice::class;

    protected static ?string $navigationIcon = 'heroicon-o-template';
    protected static ?string $navigationGroup = 'Landing Page';
    protected static ?int $navigationSort = 4;

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
                                Tab::make('Прайс контент')
                                    ->schema([
                                        TextInput::make('price_title'),
                                        Textarea::make('price_desc'),
                                    ]),
                                Tab::make('Прайс тарифы')
                                    ->schema([
                                        TextInput::make('price_amount')->numeric(),
                                        TextInput::make('price_name'),
                                        Textarea::make('price_options'),
                                    ]),
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('price_amount')->limit(10),
                TextColumn::make('price_name')->limit(10),
                TextColumn::make('price_options')->limit(10),
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
            'index' => Pages\ListLandingPrices::route('/'),
            'create' => Pages\CreateLandingPrice::route('/create'),
            'edit' => Pages\EditLandingPrice::route('/{record}/edit'),
        ];
    }
}
