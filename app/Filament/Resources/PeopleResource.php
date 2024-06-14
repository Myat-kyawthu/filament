<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeopleResource\Pages;
use App\Filament\Resources\PeopleResource\RelationManagers;
use App\Models\People;
use App\Models\Person;
use Doctrine\DBAL\Schema\Schema;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeopleResource extends Resource
{
    protected static ?string $model = Person::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Owner Management";
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\Section::make("User Name And Profile")
            ->description("Profile Picture and Name")
            ->schema([ 
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                ->required()
                ->image(),
            ])->columns(2),
        
           
            Forms\Components\Section::make("User Detail")
            ->description("User INFO")
            ->schema([
                Forms\Components\TextInput::make('email')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('address')
                ->required()
                ->maxLength(455),
            Forms\Components\TextInput::make('phone_number')
                ->required()
                ->maxLength(455),
                Forms\Components\DatePicker::make('birth_date')
                ->required()
                ->maxDate(now())
            ])->columns(2),
          
            Forms\Components\Section::make("About")
            ->description("User's info")
            ->schema([
                Forms\Components\TagsInput::make("tags")
                ->suggestions([
                    'Football',
                    'Guitar' ,
                    'Game',
                    'Golf'
                ]),
                    Forms\Components\RichEditor::make('content')
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ]),
            ])->columns(2)
        ]); 
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                ->searchable(),
                Tables\Columns\TextColumn::make('name')
                ->searchable(),
                Tables\Columns\TextColumn::make('email')
                ->searchable(),
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
            'index' => Pages\ListPeople::route('/'),
            'create' => Pages\CreatePeople::route('/create'),
            'view' => Pages\ViewPeople::route('/{record}'),
            'edit' => Pages\EditPeople::route('/{record}/edit'),
        ];
    }
}
