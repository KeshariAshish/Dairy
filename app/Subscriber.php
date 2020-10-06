<?php

namespace App;
use App\User;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable =[
        'user_id',
        'product_id',
        'price',
        'is_active',
        //'subscribed_date',
        'created_by'
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function products(){
        return $this->belongstoMany('App\Product');
    }
}
