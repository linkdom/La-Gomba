<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'order_id',
            'user_id',
            'items',
            'amount',
            'value',
            'shipping_city',
            'shipping_postcode',
            'shipping_street',
            'customer_phone'
        ];


}
