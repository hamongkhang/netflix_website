<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    //
    protected $table='nations';
    protected $fillable=['nation_name'];

    public function movie()
    {
        return $this->hasMany('App\Movie');
    }

}
