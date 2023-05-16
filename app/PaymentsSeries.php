<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Traits\HasCompositePrimaryKey;

class PaymentsSeries extends Model
 {
    //
    protected $table = 'payments_series';
    protected $fillable = [
        'id', 'series_id', 'user_id', 'created_at', 'updated_at'
    ];
}