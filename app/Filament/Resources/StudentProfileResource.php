<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\StudentProfile;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\StudentProfileResource\Pages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StudentProfileResource extends Resource
{
    protected static ?string $model = StudentProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Student Profil';
    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole(['admin']);
    }
    public static function canCreate(): bool
    {
        return false;
    }
    public static function canEdit(Model $record): bool
    {
        return Auth::user()->hasRole(['admin','student']);
    }
    public static function canDelete(Model $record): bool
    {
        return false;
    }


    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                TextInput::make('first_name')->required(),
                TextInput::make('middle_name')->required(),
                TextInput::make('last_name')->required(),
                DatePicker::make('date_of_birth')->required()
                ->maxDate(now())->format('Y-m-d'),
                TextInput::make('phone')->required()->placeholder('+{998}(00) 000-00-00')->mask(fn (TextInput\Mask $mask) => $mask->pattern('+998(00) 000-00-00')),
                TextInput::make('city')->required(),
                TextInput::make('address')->required(),
                TextInput::make('TIN')->required()->length(9)->mask(fn (TextInput\Mask $mask) => $mask->pattern('000000000')),
                TextInput::make('passport_series')->length(2)->required()->placeholder('AB'),
                TextInput::make('passport_number')->length(7)->required()->placeholder('1234567')->mask(fn (TextInput\Mask $mask) => $mask->pattern('0000000')),
                Select::make('subject')
                ->options([
                         '1' => 'PHP',
                         '2' => 'PYTHON',
                         '3' => 'JS',
                ])->required()->default('1')
                ->disablePlaceholderSelection(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                BadgeColumn::make('first_name')->sortable()->searchable(),
                BadgeColumn::make('middle_name')->sortable()->searchable(),
                BadgeColumn::make('last_name')->sortable()->searchable(),
                BadgeColumn::make('date_of_birth')->sortable()->searchable(),
                BadgeColumn::make('phone')->sortable()->searchable(),
                BadgeColumn::make('city')->sortable()->searchable(),
                BadgeColumn::make('address')->sortable()->searchable(),
                BadgeColumn::make('TIN')->sortable()->searchable(),
                BadgeColumn::make('passport_series')->sortable()->searchable(),
                BadgeColumn::make('passport_number')->sortable()->searchable(),
                BadgeColumn::make('subject')->sortable()->searchable(),

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
            'index' => Pages\ListStudentProfiles::route('/'),
            'create' => Pages\CreateStudentProfile::route('/create'),
            'edit' => Pages\EditStudentProfile::route('/{record}/edit'),
        ];
    }
}
