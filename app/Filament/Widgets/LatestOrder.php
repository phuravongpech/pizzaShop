<?php

namespace App\Filament\Widgets;

use Closure;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\OrderDetail;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrder extends BaseWidget
{
    // protected static ?string $model = OrderDetail::class;
    protected int|string|array $columnSpan = 'full';
    protected static ?int $sort = 4;

    protected function getTableQuery(): Builder
    {
        // ...
        return OrderDetail::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('order.customer_id')
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
                TextColumn::make('food.name')
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
                TextColumn::make('size.name')
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
                TextColumn::make('crust.name')
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
                TextColumn::make('quantity'),
                TextColumn::make('created_at')
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
                TextColumn::make('updated_at')
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
        ];
    }
}
