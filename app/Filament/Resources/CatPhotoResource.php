<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CatPhotoResource\Pages;
use App\Filament\Resources\CatPhotoResource\RelationManagers;
use App\Models\cat_photo;
use App\Models\CatPhoto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CatPhotoResource extends Resource
{
    protected static ?string $model = cat_photo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Patient Management";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make("image")
                ->image()
                ->imageEditorAspectRatios([
                    '1:1',
                ])
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCatPhotos::route('/'),
            'create' => Pages\CreateCatPhoto::route('/create'),
            'view' => Pages\ViewCatPhoto::route('/{record}'),
            'edit' => Pages\EditCatPhoto::route('/{record}/edit'),
        ];
    }
}
