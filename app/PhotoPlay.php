<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoPlay extends Model
{
    protected $fillable = [
        'photo_id','user_id'
    ];
}
