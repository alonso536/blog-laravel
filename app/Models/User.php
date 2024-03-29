<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'username',
        'name',
        'surname',
        'email',
        'password',
        'phone',
        'age',
        'image'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    protected $dates = [
        'deleted_at'
    ];


    public function posts() {
        return $this->hasMany(Post::class)->whereNull('deleted_at')->orderBy('updated_at', 'desc');
    }

    public function reviews() {
        return $this->hasMany(Review::class)->orderBy('updated_at', 'desc');
    }

    public function likes() {
        return $this->hasMany(Like::class)->orderBy('updated_at', 'desc');
    }
}
