<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected $fillable = ['title', 'user_id', 'description', 'is_publish', 'is_active', 'deleted_at'];
        // OR
        // another method for Eloquent
    // protected $guarded = [];

    public function user()  // User() Name of Relationship
    {
        return $this->belongsTo(User::class);   // belongsTo() means Inverse function
    }

   public function tags()
   {
    return $this->morphToMany(Tag::class, 'taggeable');
   }

   //  use for 7,8 version
//    public function getTitleAttribute($title)
//    {
//     // return ucfirst($title);     // first letter upper case
//     return strtoupper($title);      // all letter upper case
//    }

        //  use for 9 version
    // public function title(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => ucfirst($value),
    //     );
        //}

        //  ------ Mutator----------
        // we use Mutator : VERSION x8
        // Why we use Mutator : We Enter the Upper case data but in DB insert lower case
        // public function setTitleAttribute($value)
        // {
        //     return $this->attributes['title'] = strtolower($value);
        // }

        // we use Mutator : VERSION x9

        protected function title(): Attribute
            {
                return Attribute::make(
                    get: fn($value) => ucfirst($value),
                    set: fn($value) => strtolower($value),
                );
            }
}
