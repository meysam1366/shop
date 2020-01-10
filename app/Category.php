<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'parent_id',
        'img_thumbnail',
        'width',
        'height',
        'status',
        'order',
    ];

    public function getOrder()
    {
        return $this->order == null ? 0 : $this->order;
    }

    public function getTitle($parent_id)
    {
        if ($parent_id != null) {
            $category_parent = Category::where('id',$parent_id)->select('title')->first();
        }else {
            $category_parent = null;
        }

        return $category_parent;
    }
}
