<?php

namespace App\Filament\Resources\LandingPage\LandingHomeResource\Pages;

use App\Filament\Resources\LandingPage\LandingHomeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLandingHomes extends ListRecords
{
    protected static string $resource = LandingHomeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
