<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'title',
        'code',
        'discount',
        'start_time',
        'end_time',
        'count_use',
    ];
}
