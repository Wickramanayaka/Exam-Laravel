<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'first_name', 'last_name', 'telephone', 'address_line', 'street', 
        'city', 'district', 'student_name', 'active', 'postal_code', 'school', 'province', 'gender', 'birth_day',
        'ol_year', 'username', 'tuition_class', 'tuition_class_code','otp','reg_number','slang'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function enrolls()
    {
        return $this->hasMany(Enroll::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function monthAttendances()
    {
        return $this->hasMany(Attendance::class)->month();
    }
}
