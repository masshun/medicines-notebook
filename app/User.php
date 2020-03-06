<?php

namespace App;

use App\Notifications\VerifyEmailJP;
use App\Notifications\ResetPasswordJP as ResetPasswordNotificationJP;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//オーバーライド
    public function sendEmailVerificationNotification()
    {
        // $this->notify(new VerifyEmail);
        $this->notify(new VerifyEmailJP);
    }

    public function sendPasswordResetNotification($token)
    {
        // $this->notify(new ResetPasswordNotification($token));
        $this->notify(new ResetPasswordNotificationJP($token));
    }
}
