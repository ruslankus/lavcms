<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StructTrl extends Model
{
    public function scopeAllTrl($query, $lng_id = 1){
        $query->where('lng_id','=',$lng_id);
    }


    public function scopeOneTrl($query, $lng_id = 1, $struct_id){
        $query->where('lng_id','=',$lng_id);
        $query->where('struct_id','=', $struct_id );
    }


    public function scopeTrl($query,$lng_id = 1){
        $query->where('lng_id','=',$lng_id);
    }


    public function struct(){
        return $this->belongsTo('App\Models\Structure','struct_id','id');
    }
}
