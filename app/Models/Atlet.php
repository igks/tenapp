<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atlet extends Model
{
    use HasFactory;
    protected $table = 'atlet';
    protected $fillable = [
      'club_id'
      ,'nama'
      ,'tanggal_lahir'
      ,'tempat_lahir'
      ,'jenis_kelamin'
      ,'agama'
      ,'status'
      ,'nik'
      ,'alamat'
      ,'kode_pos'
      ,'nama_sekolah'
      ,'tinggi'
      ,'berat'
      ,'telepon'
      ,'nama_ayah'
      ,'nama_ibu'
      ,'telepon_wali'
      ,'nama_kejuaraan'
      ,'tahun_kejuaraan'
      ,'tingkat_kejuaraan'
      ,'tempat_kejuaraan'
      ,'sertifikat'
    ];

    public static function rules($merge = [])
    {
      return array_merge(
        [
            'club_id' => 'required'
            ,'nama' => 'required'
            ,'tanggal_lahir' => 'required|date'
            ,'tempat_lahir' => 'required'
            ,'jenis_kelamin' => 'required'
            ,'agama' => 'required'
            ,'status' => 'required'
            ,'nik' => 'required|numeric'
            ,'alamat' => 'required'
            ,'nama_sekolah' => 'required'
            ,'tinggi' => 'required'
            ,'berat' => 'required'
            ,'telepon' =>'numeric'
            ,'telepon_wali' => 'numeric'
            ,'nama_kejuaraan' => 'required'
            ,'tahun_kejuaraan' => 'required|numeric'
            ,'tingkat_kejuaraan' => 'required'
            ,'tempat_kejuaraan' => 'required'
        ],
        $merge
      );
    }

    public static function getClubName($id){
        $clubId =  Player::find($id)->club_id ?? null;
        if($clubId == null) return "-";
        return Club::find($clubId)->name;
      }
}
