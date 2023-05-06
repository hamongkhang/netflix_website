<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Traits\HasCompositePrimaryKey;

class Movie extends Model {
    //
    protected $table = 'movies';
    protected $fillable = [ 'vie_name', 'series_id', 'task_number', 'eng_name', 'cate_id', 'nation_id', 'language_id',
    'year_id', 'poster_image', 'information', 'trailer', 'director', 'actor', 'quality', 'point', 'time' ];

    public function cate() {
        return $this->belongsToMany( 'App\Cate' );
    }

    public function language() {
        return $this->belongsTo( 'App\Language' );
    }

    public function nation() {
        return $this->belongsTo( 'App\Nation' );
    }

    public function year() {
        return $this->belongsTo( 'App\Year' );
    }

    public function link() {
        return $this->hasOne( 'App\Link' );
    }

    public function cabinet() {
        return $this->hasMany( 'App\Cabinet' );
    }
}
