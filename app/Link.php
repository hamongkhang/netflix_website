<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //hihi
    protected $table='links';

    public function movie()
    {
        return $this->hasOne('App\Movie');
    }
}
