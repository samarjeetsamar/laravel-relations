<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorizable extends Model
{
    protected $fillable = ['categorizable_id', 'categorizable_type'];

    protected $timestamps = true;
}
