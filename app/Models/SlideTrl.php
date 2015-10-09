<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlideTrl extends Model
{
    public function struct(){
        return $this->belongsTo('App\Models\Slides','slide_id','id');
    }
}
