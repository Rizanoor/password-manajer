<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppsResource\Pages;
use App\Filament\Resources\AppsResource\RelationManagers;
use App\Models\Apps;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class AppsResource extends Resource
{
    protected static ?string $model = Apps::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'default' => 1,
                    'sm' => 1,
                    'xl' => 1,
                    '2xl' => 1,
                ])
                    ->schema([
                        Select::make('categories_id')
                            ->label('Category')
                            ->options(Category::all()->pluck('name', 'id'))->required(),
                        TextInput::make('name')->required(),
                        TextInput::make('username'),
                        TextInput::make('email')->email()->required(),
                        TextInput::make('password')
                            ->password()
                            ->required(),
                        Textarea::make('description'),
                        FileUpload::make('photos'),
                    ])
                    ->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('username')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                ImageColumn::make('photos')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListApps::route('/'),
            'create' => Pages\CreateApps::route('/create'),
            'edit' => Pages\EditApps::route('/{record}/edit'),
        ];
    }
}
