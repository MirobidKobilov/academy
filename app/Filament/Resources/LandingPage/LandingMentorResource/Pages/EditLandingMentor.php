<?php

namespace App\Filament\Resources\LandingPage\LandingMentorResource\Pages;

use App\Filament\Resources\LandingPage\LandingMentorResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLandingMentor extends EditRecord
{
    protected static string $resource = LandingMentorResource::class;

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
