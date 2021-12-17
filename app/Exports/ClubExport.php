<?php

namespace App\Exports;

use App\Models\Club;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ClubExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Club::all();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Leader',
            'Phone',
            'Address',
            'City',
            'State'
        ];
    }

    public function map($club): array
    {
        $index = 0;
        return [
            $club->name,
            $club->leader,
            $club->phone,
            $club->address,
            $club->city,
            $club->state,
        ];
    }
}
