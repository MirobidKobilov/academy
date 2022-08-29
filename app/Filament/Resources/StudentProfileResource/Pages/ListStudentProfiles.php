<?php

namespace App\Filament\Resources\StudentProfileResource\Pages;

use Action\ViewAction;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\StudentProfileResource;
use Filament\Forms\Components\Actions\Modal\Actions\Action;

class ListStudentProfiles extends ListRecords
{
    protected static string $resource = StudentProfileResource::class;
    protected function getActions(): array
    {
        
        return [
            Actions\CreateAction::make(),
        ];
    }

   
  
}
