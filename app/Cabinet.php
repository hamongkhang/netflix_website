<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Traits\HasCompositePrimaryKey;

class Cabinet extends Model
{
    //
    protected $table='cabinets';
    protected $fillable=['movie_id','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }
}
