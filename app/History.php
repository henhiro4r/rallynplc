<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'game_id','teamA','resultA','teamB','resultB','is_done'
    ];

    public function game(){
        return $this->belongsTo('App\Game');
    }

    public function teamName(int $id) {
        $user = User::findOrFail($id);
        return $user->name;
    }
}
