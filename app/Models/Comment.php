<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;


    protected $table = "comments";
    protected $fillable = ["comment", "commentable_id", "commentable_type", 'likes'];

    public function commentable() {
        return $this->morphTo();
    }
    
    

}
