<?php

namespace ProactiveAnts\Store;

use Illuminate\Database\Eloquent\Model;
use ProactiveAnts\Store\Product;

class Tag extends Model
{
    protected $table = 'store_tags';

    public function products()
    {
        return $this->belongsToMany(Product::class,'store_product_tags','store_tag_id','store_product_id');
    }
}
