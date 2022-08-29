<?php

namespace App\Filament\Resources\LandingPage;

use App\Filament\Resources\LandingPage\LandingCourseResource\Pages;
use App\Filament\Resources\LandingPage\LandingCourseResource\RelationManagers;
use App\Models\Landing\LandingCourse;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
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

class LandingCourseResource extends Resource
{
    protected static ?string $model = LandingCourse::class;

    protected static ?string $navigationIcon = 'heroicon-o-template';
    protected static ?string $navigationGroup = 'Landing Page';
    protected static ?int $navigationSort = 3;

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
                        TextInput::make('course_title'),
                        Textarea::make('course_desc'),
                        FileUpload::make('course_image'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->limit(10)->searchable(),
                TextColumn::make('course_title')->limit(10)->searchable(),
                TextColumn::make('course_desc')->limit(10),
                ImageColumn::make('course_image'),
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
            'index' => Pages\ListLandingCourses::route('/'),
            'create' => Pages\CreateLandingCourse::route('/create'),
            'edit' => Pages\EditLandingCourse::route('/{record}/edit'),
        ];
    }
}
