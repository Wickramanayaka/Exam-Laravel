<?php

namespace ProactiveAnts\Advertisement;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'adv_advertisements';

    protected $fillable = ['name' , 'adv_category_id', 'position', 'image', 'publish'];

    public function category()
    {
        return $this->belongsTo(Category::class,'adv_category_id');
    }
}
