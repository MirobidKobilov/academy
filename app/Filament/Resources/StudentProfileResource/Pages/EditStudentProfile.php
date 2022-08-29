<?php

namespace App\Filament\Resources\StudentProfileResource\Pages;

use App\Filament\Resources\StudentProfileResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentProfile extends EditRecord
{
    protected static string $resource = StudentProfileResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
