<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;

    protected $table = "images";

    protected $fillable = ['url', 'imageable_id', 'imageable_type'];


    public function imageable() {

        return $this->morphTo();
    }

}
