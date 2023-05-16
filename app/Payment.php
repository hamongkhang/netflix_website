<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
    //
    protected $table = 'payments';
    protected $fillable = [
        'id', 'movie_id', 'user_id', 'created_at', 'updated_at'
    ];
}
