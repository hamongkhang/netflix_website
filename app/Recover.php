<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recover extends Model
{
    //
    protected $table='recovers';
    protected $fillable=['email','recover_code'];
}
