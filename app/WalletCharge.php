<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletCharge extends Model
{
    //
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Wallet()
    {
        return $this->belongsTo('App\Wallet');
    }
}
