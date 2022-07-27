<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'Name',
    //     'Phone',
    //     'Adress',
    //     'Email',
    // ];

        // OR
        // another method for Eloquent 
    protected $guarded = [];
}
