<?php

namespace App\Exports;

use App\Models\Player;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use DateTime;

class PlayerExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Player::all();
    }

    public function headings(): array
    {
        return [
            'Club',
            'Name',
            'NIK',
            'Date of Birth',
            'Address',
            'City',
            'State',
            'Handed',
            'Bet Wood',
            'Front Hand Rubber',
            'Back Hand Rubber'
        ];
    }

    public function map($player): array
    {
        $index = 0;
        return [
            Player::getClubName($player->club_id),
            $player->first_name . " " . $player->last_name,
            $player->nik,
            Date::dateTimeToExcel(new DateTime($player->date_of_birth)),
            $player->address,
            $player->city,
            $player->state,
            $player->handed,
            $player->bet_wood,
            $player->fh_rubber,
            $player->bh_rubber
        ];
    }
}
