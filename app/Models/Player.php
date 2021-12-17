<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'club_id', 'first_name', 'last_name','nik', 'date_of_birth','address','city','state', 'handed', 'bet_wood', 'fh_rubber', 'bh_rubber'
    ];

    protected $hidden = ['created_at', 'updated_at'];
    
    public static function rules($merge = [])
    {
      return array_merge(
        [
          'club_id' => 'required',
          'first_name' => 'required',
          'last_name' => 'required',
          'nik' => 'required|numeric',
          'date_of_birth' => 'required|date',
          'address' => 'required',
          'city' => 'required',
          'state' => 'required',
          'handed' => 'required',
          'bet_wood' => 'required',
          'fh_rubber' => 'required',
          'bh_rubber' => 'required'
        ],
        $merge
      );
    }

    public function getName($id){
      $player =  Player::find($id);
      if($player != null){
        return $player->first_name . " " . $player->last_name;
      }else{
        return "-";
      }
    }

    public function getClubName($id){
      $clubId =  Player::find($id)->club_id ?? null;
      if($clubId == null) return "-";
      return Club::find($clubId)->name;
    }
}
