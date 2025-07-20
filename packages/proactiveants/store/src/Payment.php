<?php

namespace ProactiveAnts\Store;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "store_payments";

    protected $fillable = [
        'store_order_id', 'date', 'amount', 'ipg_payment_id'
    ];
}
