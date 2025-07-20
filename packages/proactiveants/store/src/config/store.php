<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'merchant_id' => '',
    'secret' => '',
    'sandbox' => 'https://sandbox.payhere.lk/pay/checkout',
    'live' => 'https://www.payhere.lk/pay/checkout',
    'return' => 'http://domain.com/bookshop/cart/ipg/return',
    'cancel' => 'http://domain.com/bookshop/cart/ipg/cancel',
    'notify' => 'http://domain.com/bookshop/cart/ipg/notify',
    'currency' => 'LKR',
];