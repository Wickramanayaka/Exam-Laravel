<?php

namespace ProactiveAnts\Store;

use ProactiveAnts\Store\Order;

class DeliveryCharge
{
    public static function calculate(Order $order){
        $fee = array(350,250);
        // Calculate total weight for the order.
        $weight = 0;
        foreach ($order->products as $product) {
            $weight += $product->product->weight * $product->quantity;
        }
        if($weight > 1000){
            $extra = $weight - 1000;
            $extra = round($extra/1000);
            return $fee[0] + ($fee[1] * $extra);
        }
        else{
            return $fee[0];
        }
    }
}