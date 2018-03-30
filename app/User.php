<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MailResetPasswordToken;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'autor', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function artigos(){
        return $this->hasMany('App\Artigo');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));
    }
    public function tasks(){
        return $this->hasOne('App\Task');
    }
}
