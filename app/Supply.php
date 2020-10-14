<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'date',
        'slot',
        'quantity',
        'created_by'
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }
}
