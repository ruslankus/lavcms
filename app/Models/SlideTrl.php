<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlideTrl extends Model
{
    public function struct(){
        return $this->belongsTo('App\Models\Slides','slide_id','id');
    }


    public function scopeOneTrlContent($query, $slide_id, $lng_id = 1){
        $query->where('lng_id','=',$lng_id);
        $query->where('slide_id','=', $slide_id );
    }
}
