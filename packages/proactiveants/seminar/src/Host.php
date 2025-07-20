<?php

namespace ProactiveAnts\Seminar;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    protected $table = 'sem_hosts';

    protected $fillable = ['name', 'active'];
}
