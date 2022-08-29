<?php

namespace App\Filament\Resources\LandingPage;

use App\Filament\Resources\LandingPage\LandingMentorResource\Pages;
use App\Filament\Resources\LandingPage\LandingMentorResource\RelationManagers;
use App\Models\Landing\LandingMentor;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
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

class LandingMentorResource extends Resource
{
    protected static ?string $model = LandingMentor::class;

    protected static ?string $navigationIcon = 'heroicon-o-template';
    protected static ?string $navigationGroup = 'Landing Page';
    protected static ?int $navigationSort = 5;

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
                        Select::make('user_id')
                            ->label('Mentor')
                            ->relationship('user', 'name')
                            ->options(User::role('mentor')->pluck('name')),
                        TextInput::make('mentor_title'),
                        Textarea::make('mentor_desc'),
                        FileUpload::make('mentor_image'),
                        FileUpload::make('mentor_subject_image'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->limit(10),
                TextColumn::make('mentor_title')->limit(10)->searchable(),
                TextColumn::make('mentor_name')->limit(10)->searchable(),
                TextColumn::make('mentor_desc')->limit(10),
                ImageColumn::make('mentor_image'),
                ImageColumn::make('mentor_subject_image'),
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
            'index' => Pages\ListLandingMentors::route('/'),
            'create' => Pages\CreateLandingMentor::route('/create'),
            'edit' => Pages\EditLandingMentor::route('/{record}/edit'),
        ];
    }
}
