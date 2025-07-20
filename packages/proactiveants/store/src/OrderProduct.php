<?php

namespace ProactiveAnts\Store;

use Illuminate\Database\Eloquent\Model;
use ProactiveAnts\Store\Product;
use ProactiveAnts\Store\Order;

class OrderProduct extends Model
{
    protected $table = 'store_order_products';

    protected $fillable = [
        'store_product_id', 'store_order_id', 'quantity', 'price','discount', 'amount'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'store_product_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

}
