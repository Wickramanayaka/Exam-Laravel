<?php

namespace ProactiveAnts\Library;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = "lib_materials";

    protected $fillable = [
        'name', 'description', 'url', 'slang','lib_category_id', 'featured', 'image'
    ];

    public function scopeFeatured($query)
    {
        return $query->where('featured',1);
    }

    public function category()
    {
        return $this->hasOne(Category::class,'id','lib_category_id');
    }

    public function getFeaturedAttribute($value)
    {
        return $value==1?"Yes":"No";
    }

}
