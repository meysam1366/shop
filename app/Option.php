<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'category_id',
        'parent_id',
        'item_key',
        'field',
        'status',
    ];

    public function getParentTitle($parent_id)
    {
        $option = Option::where('id',$parent_id)->select('item_key')->first();

        return $option;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
