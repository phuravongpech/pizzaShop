<?php

namespace App\Filament\Resources\OrderDetailResource\Pages;

use App\Filament\Resources\OrderDetailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderDetail extends EditRecord
{
    protected static string $resource = OrderDetailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
