<?php

namespace ProactiveAnts\Store;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'store_deliveries';

    protected $fillable = [
        'amount', 'store_order_id', 'address_line', 'street', 'city', 'telephone', 'first_name', 'last_name', 'district','email'
    ];
}
