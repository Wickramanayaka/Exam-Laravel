<?php

namespace ProactiveAnts\Lesson;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'lsn_payments';

    protected $fillable = ['lsn_subscription_id', 'date', 'amount', 'ipg_payment_id'];
}
