<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
