<?php

namespace App\Filament\Resources\LandingPage\LandingCourseResource\Pages;

use App\Filament\Resources\LandingPage\LandingCourseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLandingCourse extends CreateRecord
{
    protected static string $resource = LandingCourseResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
