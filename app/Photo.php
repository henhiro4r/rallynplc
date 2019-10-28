<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'title','qr_code','value','badge'
    ];

    public function photoplay() {
        return $this->hasMany('App\PhotoPlay');
    }
}
