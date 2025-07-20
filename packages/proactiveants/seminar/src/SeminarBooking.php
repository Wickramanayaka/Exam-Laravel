<?php

namespace ProactiveAnts\Seminar;

use Illuminate\Database\Eloquent\Model;

class SeminarBooking extends Model
{
    protected $table = 'sem_seminar_bookings';

    protected $fillable = [
        'sem_seminar_id', 'sem_host_id', 'sem_location_id', 'requester_name', 'mobile', 'email', 'date', 'confirmed'
    ];

    protected $dates = ['date'];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class,'sem_seminar_id','id');
    }

    public function host()
    {
        return $this->belongsTo(Host::class, 'sem_host_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'sem_location_id', 'id');
    }

    public function getConfirmedAttribute($value)
    {
        return $value==1?"Yes":"No";
    }

    public function getDateAttribute($value) {
        $date = \Illuminate\Support\Carbon::createFromFormat('Y-m-d', $value);
        return $date;
    }
}
