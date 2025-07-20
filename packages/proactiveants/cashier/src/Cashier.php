<?php

namespace ProactiveAnts\Cashier;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cashier extends Authenticatable
{
    use Notifiable;

    protected $table = 'ca_cashiers';

    protected $guard = 'cashier';

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $fillable = ['name', 'email', 'password',  'otp', 'otp_verified_at'];

}
