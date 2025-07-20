<?php

namespace ProactiveAnts\Store;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $table = 'store_product_tags';

    protected $fillable = ['store_product_id', 'store_tag_id'];
}
