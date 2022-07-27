<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test1 extends Model
{
    use HasFactory;
    // protected $table = 'employee';   //Its means that Agr ap ksi b table ko represent krna chahty hy to 

    protected $fillable = [
        'Name',
        'Phone',
        'Adress',
        'Email',
        'Department'
    ];
}
