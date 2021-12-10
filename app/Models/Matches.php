<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;
    protected $table = 'match';
    protected $fillable = [
        'date', 'time', 'location', 'table', 'player_a_1', 'player_a_2', 'player_b_1', 'player_b_2', 'score_a_1','score_a_2','score_a_3','score_a_4','score_a_5','score_b_1','score_b_2','score_b_3','score_b_4','score_b_5'
    ];
    
    public static function rules($merge = [])
    {
      return array_merge(
        [
          
        ],
        $merge
      );
    }
    
    public function calculateTotal(Matches $matches){
      $teamA = 0;
      $teamB = 0;

      if($matches->score_a_1 != null || $matches->score_a_1 != ""){
        $matches->score_a_1 > $matches->score_b_1 ? $teamA += 1 : $teamB +=1;
      }
      if($matches->score_a_2 != null || $matches->score_a_2 != ""){
        $matches->score_a_2 > $matches->score_b_2 ? $teamA += 1 : $teamB +=1;
      }
      if($matches->score_a_3 != null || $matches->score_a_3 != ""){
        $matches->score_a_3 > $matches->score_b_3 ? $teamA += 1 : $teamB +=1;
      }
      if($matches->score_a_4 != null || $matches->score_a_4 != ""){
        $matches->score_a_4 > $matches->score_b_4 ? $teamA += 1 : $teamB +=1;
      }
      if($matches->score_a_5 != null || $matches->score_a_5 != ""){
        $matches->score_a_5 > $matches->score_b_5 ? $teamA += 1 : $teamB +=1;
      }
      
      $total = [
        'teamA' => $teamA,
        'teamB' => $teamB
      ];
  
      return $total;
    }

}
