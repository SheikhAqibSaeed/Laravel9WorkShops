<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, SoftDeletes; // The SoftDeletes trait will automatically cast the deleted_at attribute to a DateTime / Carbon instance for you.

    // protected $fillable = [
    //     'Name',
    //     'Phone',
    //     'Adress',
    //     'Email',
    // ];

    protected $fillable = ['title', 'description', 'is_publish', 'is_active', 'deleted_at'];
        // OR
        // another method for Eloquent 
    // protected $guarded = [];
}
