<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    public function slide_trl(){
        return $this->hasMany('App\Models\SlideTrl','slide_id','id');
    }
}
