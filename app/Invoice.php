<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'total_quantity',
        'price',
        'total_amount',
        'paid_amount',
        'due_amount',
        'is_paid',
        'payment_mode',
        'payment_received_by',
        'created_by'
    ];
}
