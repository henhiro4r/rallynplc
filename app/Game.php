<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'title','type','qr_code','liaison_id','location'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'liaison_id', 'id');
    }

    public function history(){
        return $this->belongsToMany('App\History', 'histories');
    }
}
