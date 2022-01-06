<?php

namespace App\Exports;

use App\Models\Atlet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use DateTime;

class AtletExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Atlet::all();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Tanggal Lahir',
            'Tempat Lahir',
            'Jenis Kelamin',
            'Agama',
            'Status',
            'NIK',
            'Alamat',
            'Kode Pos',
            'Nama Sekolah',
            'Nama Club',
            'Tinggi Badan',
            'Berat Badan',
            'Telepon',
            'Nama Ayah',
            'Nama Ibu',
            'Telepon Wali',
            'Nama Kejuaraan',
            'Tahun Kejuaraan',
            'Tingkat Kejuaraan',
            'Tempat Kejuaraan',
            'Sertifikat'
        ];
    }

    public function map($atlet): array
    {
        return [
            $atlet->nama,
            Date::dateTimeToExcel(new DateTime($atlet->tanggal_lahir)),
            $atlet->tempat_lahir,
            $atlet->jenis_kelamin,
            $atlet->agama,
            $atlet->status,
            $atlet->nik,
            $atlet->alamat,
            $atlet->kode_pos,
            $atlet->nama_sekolah,
            Atlet::getClubName($atlet->id),
            $atlet->tinggi,
            $atlet->berat,
            $atlet->telepon,
            $atlet->nama_ayah,
            $atlet->nama_ibu,
            $atlet->telepon_wali,
            $atlet->nama_kejuaraan,
            $atlet->tahun_kejuaraan,
            $atlet->tingkat_kejuaraan,
            $atlet->tempat_kejuaraan,
            $atlet->sertifikat
        ];
    }
}
