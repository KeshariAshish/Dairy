<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'price',
        'unit',
        'is_active',
        'user_id'
    ];

    public function orders(){
        return $this->belongsToMany('App\Order');
    }

    public function stocks(){
        return $this->belongsToMany('App\Product');
    }

    public function subscribers(){
        return $this->belongsToMany('App\Subscriber');
    }

    public function supplies(){
        return $this->belongsToMany('App\Supply');
    }

    public function invoices(){
        return $this->belongsToMany('App\Invoice');
    }

}
