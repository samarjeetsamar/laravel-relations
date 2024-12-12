<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Support\Address;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address_line_one',
        'address_line_two',
        'first_name'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected function address(): Attribute {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => new Address(
                $attributes['address_line_one'] ?? '',
                $attributes['address_line_two'] ?? '',
            ),
        );
    }

    protected function firstName() : Attribute {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value)
        );
    }



    

    public function posts() {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }


    public function latestPost() {
        return $this->hasOne(Post::class)->latestOfMany();
    }

    public function oldestPost() {
        return $this->hasOne(Post::class)->oldestOfMany();
    }

    public function phone(){
        return $this->hasOne(Phone::class, 'user_id');
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function latestOrder() {
        return $this->hasOne(Order::class)->latestOfMany();
    }

    // public function largestOrder() {
    //     return $this->orders()->one()->ofMany('price', 'max');
    // }

    
}
