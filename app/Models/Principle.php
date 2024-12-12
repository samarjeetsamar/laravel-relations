<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Principle extends Model
{
    /** @use HasFactory<\Database\Factories\PrincipleFactory> */
    use HasFactory;

    protected $table = "principles";

    protected $fillable = ["name", "school_id"];

    public function school() {
        return $this->hasOne(School::class);
    }

    public function students()  {
        return $this->hasManyThrough(Student::class, School::class);
    }


}
