<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('name')->required(),
                    Forms\Components\TextInput::make('email')->required(),
                    Forms\Components\TextInput::make('password')->required(),
                    Forms\Components\TextInput::make('phone_num'),
                    Forms\Components\FileUpload::make('img'),
                    Forms\Components\MarkdownEditor::make('description'),
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
                TextColumn::make('email')
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
                TextColumn::make('password')->limit(10)
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
                TextColumn::make('img')->label('Image'),
                TextColumn::make('phone_num')
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
                TextColumn::make('description')->limit(30)
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
                ToggleColumn::make('is_email_verified')
                            ->sortable()
                            ->searchable()
                            ->toggleable(),
                ToggleColumn::make('is_admin')
                            ->sortable()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
