<?php

namespace ProactiveAnts\Store;

use Illuminate\Database\Eloquent\Model;
use ProactiveAnts\Store\Category;
use ProactiveAnts\Store\Tag;

class Product extends Model
{
    protected $table = 'store_products';

    protected $fillable = [
        'code', 'name', 'description', 'author', 'publisher', 'published_year', 'price', 'quantity',
        'store_category_id', 'weight', 'slang', 'published', 'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'store_category_id');
    }

    public function getPublishedAttribute($value)
    {
        return $value==1?"Yes":"No";
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'store_product_tags','store_product_id','store_tag_id');
    }

    public function scopePublished($query)
    {
        return $query->where('published',1);
    }
}
