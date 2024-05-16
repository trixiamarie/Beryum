<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'recipe_id',
        'image_url',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function recipe() {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }

    public function likes()
{
    return $this->hasMany(PostLike::class, 'post_id');
}

public function comments()
{
    return $this->hasMany(PostComment::class, 'post_id');
}

public function savedByUsers()
{
    return $this->belongsToMany(User::class, 'postsaved', 'post_id', 'user_id');
}

public function parentPost()
    {
        return $this->belongsTo(Post::class, 'parent_post_id');
    }

   
    public function childPosts()
    {
        return $this->hasMany(Post::class, 'parent_post_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'parent_post_id');
    }

}
