<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name','username','password', 'login_code', 'detail_id','role_id','point_now','point_used','is_login','status','last_login','last_logout'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function games(){
        return $this->hasOne('App\Game');
    }

    public function detail(){
        return $this->belongsTo('App\Detail');
    }

    public function quiz_play(){
        return $this->belongsToMany('App\QuizPlay');
    }

    public function photo_play(){
        return $this->belongsTo('App\PhotoPlay');
    }

    public function isAdmin(){ // admin
        if ($this->role->name == 'Admin' && $this->status == 'E' && $this->is_login = '1'){
            return true;
        }
        return false;
    }

    public function isLiaison(){ // LO
        if ($this->role->name == 'Liaison' && $this->status == 'E' && $this->is_login = '1'){
            return true;
        }
        return false;
    }

    public function isParticipant(){ // participant
        if ($this->role->name == 'Participant' && $this->status == 'E' && $this->is_login = '1'){
            return true;
        }
        return false;
    }
}
