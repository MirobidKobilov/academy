<?php

namespace App\Filament\Resources\LandingPage\LandingHomeResource\Pages;

use App\Filament\Resources\LandingPage\LandingHomeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLandingHome extends EditRecord
{
    protected static string $resource = LandingHomeResource::class;

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
