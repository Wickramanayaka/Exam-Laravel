<?php

namespace ProactiveAnts\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'adm_admin_users';

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password',  'otp', 'otp_verified_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
