<?php

namespace ProactiveAnts\Store;

use Illuminate\Database\Eloquent\Model;
use App\User;
use ProactiveAnts\Store\OrderProduct;

class Order extends Model
{
    protected $table = 'store_orders';

    protected $fillable = [
        'user_id', 'date', 'status', 'delivery_type', 'payment_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(OrderProduct::class,'store_order_id');
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class, 'store_order_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'store_order_id');
    }

}
