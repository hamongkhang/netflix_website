<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Traits\HasCompositePrimaryKey;

class Series extends Model
 {
    //
    protected $table = 'series';
    protected $fillable = [
        'id', 'series_name', 'poster', 'description', 'information', 'number_of_movie', 'director', 'actor', 'year', 'created_at', 'updated_at', 'price'
    ];
}