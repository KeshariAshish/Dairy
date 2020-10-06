<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable =[
        'date',
        'product_id',
        'total_quantity',
        'available_quantity'
    ];

    public function products(){
        return $this->belongsToMany('App\Product');
    }
}
