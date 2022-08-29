<?php

namespace App\Filament\Resources\LandingPage\LandingAboutResource\Pages;

use App\Filament\Resources\LandingPage\LandingAboutResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLandingAbouts extends ListRecords
{
    protected static string $resource = LandingAboutResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
