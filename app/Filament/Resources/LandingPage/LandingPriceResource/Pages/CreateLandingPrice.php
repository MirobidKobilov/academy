<?php

namespace App\Filament\Resources\LandingPage\LandingPriceResource\Pages;

use App\Filament\Resources\LandingPage\LandingPriceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLandingPrice extends CreateRecord
{
    protected static string $resource = LandingPriceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
