<?php

namespace App\Filament\Resources\LandingPage\LandingVacancyResource\Pages;

use App\Filament\Resources\LandingPage\LandingVacancyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLandingVacancy extends CreateRecord
{
    protected static string $resource = LandingVacancyResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
