<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    protected $table='languages';
    protected $fillable=['language'];

    public function movie()
    {
        return $this->hasMany('App\Movie');
    }
}
