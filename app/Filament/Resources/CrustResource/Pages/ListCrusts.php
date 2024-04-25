<?php

namespace App\Filament\Resources\CrustResource\Pages;

use App\Filament\Resources\CrustResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCrusts extends ListRecords
{
    protected static string $resource = CrustResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
