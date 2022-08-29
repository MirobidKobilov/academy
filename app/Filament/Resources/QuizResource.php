<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Quiz;
use App\Models\Role;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\MultiSelect;
use App\Filament\Resources\QuizResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\QuizResource\RelationManagers;
use Illuminate\Support\Facades\Auth;

class QuizResource extends Resource
{
    protected static ?string $model = Quiz::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Quiz';
    protected $casts = [
        'resolution' => 'array',
    ];


    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole('admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                Textarea::make('descriptions')->required(),
                Select::make('status')
                    ->options([
                        '1' => 'true',
                        '0' => 'false',
                    ])
                    ->default('1')
                    ->disablePlaceholderSelection(),
                    MultiSelect::make('resolution')
                    ->label('resolution')
                    ->options(Role::all()->pluck('name','id')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                BadgeColumn::make('title')->sortable(),
                BadgeColumn::make('descriptions')->sortable(),
                BadgeColumn::make('status')->sortable(),
                BadgeColumn::make('resolution')->sortable(),
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
            'index' => Pages\ListQuizzes::route('/'),
            'create' => Pages\CreateQuiz::route('/create'),
            'edit' => Pages\EditQuiz::route('/{record}/edit'),
        ];
    }
}
