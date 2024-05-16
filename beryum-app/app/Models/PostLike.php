<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    use HasFactory;
    protected $table = 'postlikes';

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
