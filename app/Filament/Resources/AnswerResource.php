<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnswerResource\Pages;
use App\Filament\Resources\AnswerResource\RelationManagers;
use App\Models\Answer;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class AnswerResource extends Resource
{
    protected static ?string $model = Answer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Quiz';


    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole('admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('question_id')
                    ->label('quizzes')
                    ->options(Question::all()->pluck('title','id'))->searchable(),
                TextInput::make('correct_answers'),
                Select::make('answers')
                    ->options([
                        '1' => 'true',
                        '0' => 'false',
                    ])
                    ->default('1')
                    ->disablePlaceholderSelection()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               BadgeColumn::make('question_id'),
               BadgeColumn::make('correct_answers'),
               BadgeColumn::make('answers'),

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
            'index' => Pages\ListAnswers::route('/'),
            'create' => Pages\CreateAnswer::route('/create'),
            'edit' => Pages\EditAnswer::route('/{record}/edit'),
        ];
    }
}
