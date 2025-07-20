<?php

namespace ProactiveAnts\Seminar;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    protected $table = 'sem_seminars';
    protected $fillable = ['name', 'active'];

    public function hosts()
    {
        return $this->belongsToMany(Host::class, 'sem_host_seminars', 'sem_seminar_id', 'sem_host_id');
    }
}
