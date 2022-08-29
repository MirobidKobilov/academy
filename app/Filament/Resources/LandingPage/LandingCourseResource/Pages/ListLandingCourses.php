<?php

namespace App\Filament\Resources\LandingPage\LandingCourseResource\Pages;

use App\Filament\Resources\LandingPage\LandingCourseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLandingCourses extends ListRecords
{
    protected static string $resource = LandingCourseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
