<?php

namespace ProactiveAnts\Cashier;

use Illuminate\Database\Eloquent\Model;

class CashierPayment extends Model
{
    protected $table = 'ca_cashier_payments';

    protected $fillable = ['ca_cashier_id', 'co_payment_id'];
}
