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

    /**
     * Genie
     */
    
    'merchantPgIdentifier' => '',
    'currency' => 'LKR',
    'paymentMethod' => 'Genie',
    'secretCode' => '',
    'storeName' => '',
    'url' => 'https://apps.genie.lk/merchant',
    'transactionType' => 'SALE',
    'language' => 'en',
    'successUrl' =>  url('/').'/course/genie/success',
    'errorUrl' => url('/').'/course/genie/error',
    'prefix' => env('GENIE_PREFIX', 'Int_'),
    
];