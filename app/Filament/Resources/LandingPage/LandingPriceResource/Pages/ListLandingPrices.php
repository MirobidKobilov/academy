<?php

namespace App\Filament\Resources\LandingPage\LandingPriceResource\Pages;

use App\Filament\Resources\LandingPage\LandingPriceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLandingPrices extends ListRecords
{
    protected static string $resource = LandingPriceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
