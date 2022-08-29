<?php

namespace App\Filament\Resources\LandingPage\LandingVacancyResource\Pages;

use App\Filament\Resources\LandingPage\LandingVacancyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLandingVacancies extends ListRecords
{
    protected static string $resource = LandingVacancyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
