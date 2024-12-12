<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    /** @use HasFactory<\Database\Factories\PhoneFactory> */
    use HasFactory;

    protected $table = "phones";
    protected $fillable = ["user_id", "number"];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
