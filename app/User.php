<?php

namespace App;

use Illuminate\Contracts\Auth\CanResetPassword;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'email', 'name', 'level'
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

    public function cabinet()
    {
        return $this->hasMany('App\Cabinet');
    }
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
    public function wallet()
    {
        return $this->hasOne('App\Wallet');
    }
    public function walletcharge()
    {
        return $this->hasMany('App\WalletCharge');
    }
}
