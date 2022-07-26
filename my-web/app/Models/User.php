<?php

namespace App\Models;

use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'email_verified_at' => 'datetime',
    ];
    public function posts()
    {
        // return $this->hasOne('\App\Models\Post');
        //      or
        //      One to One Relationship
        // return $this->hasOne(Post::class, 'user_id', 'id');
        // return $this->hasOne(Post::class);  // same results

        // return $this->hasMany(Post::class)->where('title', 'Quam eu ut esse cor');     // If we get single data show when we use (where)
        return $this->hasMany(Post::class);
    }
    public function postComment()

    {
        // return 'test';
        return $this->hasOneThrough(Comment::class, Post::class);
    }
    public function postComments()
    {
        return $this->hasManyThrough(Comment::class, Post::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
