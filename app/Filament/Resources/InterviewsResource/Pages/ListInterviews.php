<?php

namespace App\Filament\Resources\InterviewsResource\Pages;

use App\Filament\Resources\InterviewsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInterviews extends ListRecords
{
    protected static string $resource = InterviewsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
