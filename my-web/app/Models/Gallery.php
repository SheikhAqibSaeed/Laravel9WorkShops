<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public const Type = 1;

    public $uploads = 'assets/images/';

    protected $fillable = ['name', 'type'];

    protected function name(): Attribute
            {
                return Attribute::make(
                    get: fn($value) => $this->uploads. $value  //  Load Image path using Accessor
                );
            }
}
