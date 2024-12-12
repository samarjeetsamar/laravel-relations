<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolFactory> */
    use HasFactory;

    protected $table = "schools";

    protected $fillable = ['name'];
    
    public function principle() {
        return $this->belongsTo(Principle::class);
    }
}
