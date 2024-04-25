<?php

namespace App\Filament\Resources\CrustResource\Pages;

use App\Filament\Resources\CrustResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCrust extends EditRecord
{
    protected static string $resource = CrustResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
