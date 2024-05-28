<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\OrderDetail;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderDetailResource\Pages;
use App\Filament\Resources\OrderDetailResource\RelationManagers;

class OrderDetailResource extends Resource
{
    protected static ?string $model = OrderDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = "Order";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('order_id')
                                        ->label('Order')
                                        ->relationship('order','customer_id')
                                        ->required(),
                Forms\Components\Select::make('food_id')
                                        ->label('Food')
                                        ->relationship('food','name')
                                        ->required(),
                Forms\Components\Select::make('size_id')
                                        ->label('Size')
                                        ->relationship('size','name')
                                        ->required(),
                Forms\Components\Select::make('crust_id')
                                        ->label('Crust')
                                        ->relationship('crust','name')
                                        ->required(),
                Forms\Components\TextInput::make('quantity')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrderDetails::route('/'),
            'create' => Pages\CreateOrderDetail::route('/create'),
            'edit' => Pages\EditOrderDetail::route('/{record}/edit'),
        ];
    }    
}
