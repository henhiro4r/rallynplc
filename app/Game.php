<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'title','type','qr_code','liaison_id','location','code'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'liaison_id', 'id');
    }

    public function histories(){
        return $this->hasMany('App\History');
    }
}
