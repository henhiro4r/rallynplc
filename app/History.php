<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'game_id','teamA','resultA','teamB','resultB','is_done'
    ];
}
