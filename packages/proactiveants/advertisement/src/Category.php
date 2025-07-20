<?php

namespace ProactiveAnts\Advertisement;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'adv_categories';

    protected $fillable = ['name'];
}
