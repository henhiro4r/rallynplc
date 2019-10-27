<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        'school_name','city_name','address','coach_name','other'
    ];

    public function users(){
        return $this->hasMany('App\User');
    }
}
