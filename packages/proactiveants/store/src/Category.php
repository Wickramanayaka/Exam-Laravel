<?php

namespace ProactiveAnts\Store;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'store_categories';

    protected $fillable = ['name', 'slang', 'parent_id', 'published'];

    public function getPublishedAttribute($value)
    {
        return $value==1?"Yes":"No";
    }

    public function parents()
    {
        return $this->belongsTo(Category::class, 'parent_id')->withDefault(['name'=>""]);
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function scopePublished($query)
    {
        return $query->where('published',1);
    }
}
