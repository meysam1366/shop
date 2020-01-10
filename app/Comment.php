<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
      'parent_id',
      'product_id',
      'user_id',
      'title',
      'comment',
      'status',
    ];

    public function parent()
    {
        return $this->belongsTo(Comment::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
