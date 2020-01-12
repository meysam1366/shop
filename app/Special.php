<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    protected $fillable = [
        'title',
        'product_id',
        'start_time',
        'end_time',
        'discount',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
