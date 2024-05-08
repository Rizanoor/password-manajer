<?php

namespace App\Filament\Resources\AppsResource\Pages;

use App\Filament\Resources\AppsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApps extends ListRecords
{
    protected static string $resource = AppsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
