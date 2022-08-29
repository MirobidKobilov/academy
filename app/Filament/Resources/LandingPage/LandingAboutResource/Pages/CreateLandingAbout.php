<?php

namespace App\Filament\Resources\LandingPage\LandingAboutResource\Pages;

use App\Filament\Resources\LandingPage\LandingAboutResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLandingAbout extends CreateRecord
{
    protected static string $resource = LandingAboutResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
