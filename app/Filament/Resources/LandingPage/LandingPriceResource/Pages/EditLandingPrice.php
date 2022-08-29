<?php

namespace App\Filament\Resources\LandingPage\LandingPriceResource\Pages;

use App\Filament\Resources\LandingPage\LandingPriceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLandingPrice extends EditRecord
{
    protected static string $resource = LandingPriceResource::class;

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
