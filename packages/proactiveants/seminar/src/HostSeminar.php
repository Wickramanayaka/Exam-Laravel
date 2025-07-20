<?php

namespace ProactiveAnts\Seminar;

use Illuminate\Database\Eloquent\Model;

class HostSeminar extends Model
{
    protected $table = 'sem_host_seminars';
    protected $fillable = ['sem_host_id', 'sem_seminar_id'];
}
