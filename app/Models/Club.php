<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'leader', 'phone', 'address', 'city', 'state'
    ];
    
    public static function rules($merge = [])
    {
      return array_merge(
        [
          'name' => 'required',
          'leader' => 'required',
          'phone' => 'required|numeric',
          'address' => 'required',
          'city' => 'required',
          'state' => 'required'
        ],
        $merge
      );
    }
    
  

    // public function payment(){
    //   return $this->hasMany(Payment::class);
    // }

    // protected static function boot(){
    //   parent::boot();

    //   static::deleting(function($purchase){
    //     foreach($purchase->payment()->get() as $p){
    //       $p->delete();
    //     }

    //     foreach($purchase->purchaseDetail()->get() as $pd){
    //       $pd->delete();
    //     }
    //   });
    // }
}
