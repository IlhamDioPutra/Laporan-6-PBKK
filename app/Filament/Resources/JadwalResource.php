<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Jadwal;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\JadwalResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\JadwalResource\RelationManagers;

class JadwalResource extends Resource
{
    protected static ?string $model = Jadwal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    
                    Select::make('matkul_id')
                        ->required()
                        ->relationship('matkul','nama_matkul'),
                    Select::make('dosen_id')
                        ->required()
                        ->relationship('dosen','nama_dosen'),
                    Select::make('ruangan_id')
                        ->required()
                        ->relationship('ruangan','ruangan'),
                    Select::make('hari')
                        ->required()
                        ->options([
                            'Senin' => 'Senin',
                            'Selasa' => 'Selasa',
                            'Rabu' => 'Rabu',
                            'Kamis' => 'Kamis',
                            'Jumat' => 'Jumat',
                        ]),
                    // TextInput::make('kode_matkul')->required()->unique(ignorable: fn ($record) => $record),
                    TimePicker::make('jam_mulai')->required(),
                    TimePicker::make('jam_selesai')->required()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('matkul.nama_matkul'),
                TextColumn::make('dosen.nama_dosen'),
                TextColumn::make('ruangan.ruangan'),
                TextColumn::make('hari'),
                TextColumn::make('jam_mulai')->label('Waktu Mulai')->dateTime($format = 'H:i') ,
                TextColumn::make('jam_selesai')->label('Waktu Selesai')->dateTime($format = 'H:i')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListJadwals::route('/'),
            'create' => Pages\CreateJadwal::route('/create'),
            'edit' => Pages\EditJadwal::route('/{record}/edit'),
        ];
    }
}
