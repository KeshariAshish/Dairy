<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $fillable = [
        'product_id',
        'slot',
        'quantity',
        'available_quantity',
        'comment',
        'created_by',
        'updated_by',
        'date'
    ];
}
