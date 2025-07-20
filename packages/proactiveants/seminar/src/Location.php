<?php

namespace ProactiveAnts\Seminar;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'sem_locations';

    protected $fillable = ['name', 'active'];
}
