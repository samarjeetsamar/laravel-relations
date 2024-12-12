<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $table = "posts";
    protected $fillable = ["title", "slug", "body", "user_id"];

    public function author() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments() {

        return $this->morphMany(Comment::class, 'commentable');
        //return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function bestComment() : MorphOne {
        return $this->morphOne(Comment::class, 'commentable')->ofMany('likes', 'max');
    }

    public function categories() {
        
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public static function latestPost() {
        return \App\Models\Post::orderBy('id', 'DESC')->first();
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }

    
}
