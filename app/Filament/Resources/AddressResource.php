<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Address;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AddressResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AddressResource\RelationManagers;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                Forms\Components\Select::make('customer_id')
                                        ->label('User')
                                        ->relationship('user','name')
                                        ->required()
                                        ->searchable(),
                Forms\Components\TextInput::make('address_type')->required(),
                Forms\Components\TextInput::make('address_detail')->required(),
                Forms\Components\TextInput::make('address_no')->required(),
                Forms\Components\TextInput::make('street')->required(),
                Forms\Components\TextInput::make('city')->required(),
                Forms\Components\MarkdownEditor::make('extra_instructions'),
                ])                        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_id'),
                TextColumn::make('address_type')->limit(10),
                TextColumn::make('address_detail')->limit(10),
                TextColumn::make('address_no')->limit(10),
                TextColumn::make('street')->limit(10),
                TextColumn::make('city')->limit(10),
                TextColumn::make('extra_instructions')->limit(10),
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
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }    
}
