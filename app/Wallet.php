<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    //

    public function user()
    {
        return $this->hasOne('App\User');
    }
    public function walletcharge()
    {
        return $this->hasMany('App\WalletCharge');
    }
}
