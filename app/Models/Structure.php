<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Middleware\LangInit;

class Structure extends Model
{

    public function trl($lng_id = 1){
        return $this->hasMany('App\Models\StructTrl','struct_id','id');
    }


}
