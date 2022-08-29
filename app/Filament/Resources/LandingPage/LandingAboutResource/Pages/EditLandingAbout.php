<?php

namespace App\Filament\Resources\LandingPage\LandingAboutResource\Pages;

use App\Filament\Resources\LandingPage\LandingAboutResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLandingAbout extends EditRecord
{
    protected static string $resource = LandingAboutResource::class;

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
