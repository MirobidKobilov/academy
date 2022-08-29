<?php

namespace App\Filament\Resources\StudentProfileResource\Pages;

use Filament\Pages\Actions;

use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\StudentProfileResource;

class ViewStudentProfile extends ViewRecord
{
    protected static string $resource = StudentProfileResource::class;
    
    protected function getActions(): array
    {
        
        return [
            Actions\EditAction::make(),
        ];
    }
}
