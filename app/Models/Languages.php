<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    //


    public function trls(){
        return $this->morphMany('App\Models\StructTrl','tranlations');
    }


    public function struct(){
        return $this->hasMany('App\Models\StructTrl','lng_id','id');
    }
}
