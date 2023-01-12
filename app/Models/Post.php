<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function reviews() {
        return $this->hasMany(Review::class)->orderBy('created_at', 'desc');
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function user() {
        return $this->belongsTo(User::class)->whereNull('deleted_at');
    }
}
