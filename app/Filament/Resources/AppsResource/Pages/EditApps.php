<?php

namespace App\Filament\Resources\AppsResource\Pages;

use App\Filament\Resources\AppsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApps extends EditRecord
{
    protected static string $resource = AppsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
