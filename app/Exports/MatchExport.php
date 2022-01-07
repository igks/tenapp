<?php

namespace App\Exports;

use App\Models\Matches;
use App\Models\Atlet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use DateTime;

class MatchExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Matches::all();
    }

    public function headings(): array
    {
        return [
            'Date',
            'Time',
            'Location',
            'Table',
            'Team A Player 1',
            'Team A Player 2',
            'Team B Player 1',
            'Team B Player 2',
            'Team A Set 1',
            'Team B Set 1',
            'Team A Set 2',
            'Team B Set 2',
            'Team A Set 3',
            'Team B Set 3',
            'Team A Set 4',
            'Team B Set 4',
            'Team A Set 5',
            'Team B Set 5',
        ];
    }

    public function map($match): array
    {
        return [
            Date::dateTimeToExcel(new DateTime($match->date)),
            $match->time,
            $match->location,
            $match->table,
            Atlet::getName($match->player_a_1),
            Atlet::getName($match->player_a_2),
            Atlet::getName($match->player_b_1),
            Atlet::getName($match->player_b_2),
            $match->score_a_1,
            $match->score_b_1,
            $match->score_a_2,
            $match->score_b_2,
            $match->score_a_3,
            $match->score_b_3,
            $match->score_a_4,
            $match->score_b_4,
            $match->score_a_5,
            $match->score_b_5,
        ];
    }
}
