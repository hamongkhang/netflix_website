<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
    protected $table='cates';

    public function movie()
    {
        return $this->belongsToMany('App\Movie');
    }
}
