<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionProduct extends Model
{
    protected $fillable = [
        'option_id',
        'product_id',
        'item_value',
    ];

    protected $table = "option_product";
}
