<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'title','question','answer'
    ];

    public function quizplay() {
        return $this->hasMany('App\QuizPlay');
    }
}
