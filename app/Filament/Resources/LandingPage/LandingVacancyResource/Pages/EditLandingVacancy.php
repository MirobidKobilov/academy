<?php

namespace App\Filament\Resources\LandingPage\LandingVacancyResource\Pages;

use App\Filament\Resources\LandingPage\LandingVacancyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLandingVacancy extends EditRecord
{
    protected static string $resource = LandingVacancyResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
