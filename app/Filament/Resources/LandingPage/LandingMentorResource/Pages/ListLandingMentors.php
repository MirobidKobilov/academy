<?php

namespace App\Filament\Resources\LandingPage\LandingMentorResource\Pages;

use App\Filament\Resources\LandingPage\LandingMentorResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLandingMentors extends ListRecords
{
    protected static string $resource = LandingMentorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
