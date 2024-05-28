<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Food;
use Filament\Tables;
use App\Filament\Resources;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FoodResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FoodResource\RelationManagers;

class FoodResource extends Resource
{
    protected static ?string $model = Food::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = "Food";
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('price')->prefix('$')->required(),
                Forms\Components\Select::make('category_id')
                                        ->label('Category')
                                        ->relationship('category','name')
                                        ->required(),
                Forms\Components\MarkdownEditor::make('desc')->label('Description')->required(),
                Forms\Components\FileUpload::make('image')->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
                TextColumn::make('name')
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
                ImageColumn::make('image')
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
                TextColumn::make('desc')
                            ->limit(30)
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
                TextColumn::make('price')
                            ->prefix('$')
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
                TextColumn::make('category.name')
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
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
            'index' => Pages\ListFood::route('/'),
            'create' => Pages\CreateFood::route('/create'),
            'edit' => Pages\EditFood::route('/{record}/edit'),
        ];
    }    
}
