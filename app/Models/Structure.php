<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Middleware\LangInit;

class Structure extends Model
{

    protected $fillable = [

        'label',
        'id_name',
        'active'

    ];

    public function trl(){
        return $this->hasMany('App\Models\StructTrl','struct_id','id');
    }


    public function slides(){
        return $this->hasMany('App\Models\Slides','struct_id','id');
    }


    public function scopeActive($query){
        $query->where('active','=',true);
    }


    public function trls(){
        return $this->morphMany('App\Models\StructTrl','tranlations');
    }

    public function setActiveAttribute($active = null){

        $this->attributes['active'] = ($active == 'on')? true : false;
    }



}
