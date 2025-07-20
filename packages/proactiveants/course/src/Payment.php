<?php

namespace ProactiveAnts\Course;

use Illuminate\Database\Eloquent\Model;
use ProactiveAnts\Course\Course;

class Payment extends Model
{
    protected $table = 'co_payments';
    protected $fillable = ['co_course_id', 'user_id', 'amount', 'date', 'ipg_payment_id', 
    'status', 'reg_number', 'method', 'expiry_date', 'file_path', 'payment_for_month', 'payment_for_year', 'memo'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'co_course_id');
    }
}
