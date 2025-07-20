<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['user_id', 'co_course_id', 'check_in'];

    protected $dates = ['created_at', 'updated_at', 'check_in'];

    public function scopeMonth($query)
    {
        return $query->whereBetween('check_in',[\Carbon\Carbon::now()->startOfMonth(),\Carbon\Carbon::now()->endOfMonth()]);
    }
}
