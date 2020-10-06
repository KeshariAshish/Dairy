<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'slot',
        'quantity',
        'created_by'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
