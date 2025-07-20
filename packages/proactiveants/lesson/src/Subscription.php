<?php

namespace ProactiveAnts\Lesson;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'lsn_subscriptions';

    protected $fillable = ['grade_subject_id', 'user_id', 'date', 'status', 'amount', 'ipg_payment_id'];

    public function unit()
    {
        return $this->belongsTo(\App\Unit::class,'unit_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class,'user_id');
    }

    public function gradeSubject()
    {
        return $this->belongsTo(\App\GradeSubject::class,'grade_subject_id');
    }
}
