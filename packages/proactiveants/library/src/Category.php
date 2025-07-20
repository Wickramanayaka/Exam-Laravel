<?php

namespace ProactiveAnts\Library;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "lib_categories";

    protected $fillable = [
        'name', 'slang'
    ];

    function materials(){
        return $this->hasMany(Material::class,'lib_category_id','id');
    }

    function featuredMaterials(){
        return $this->hasMany(Material::class,'lib_category_id','id')->featured();
    }
}
