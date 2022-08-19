<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //  Make First Simplest API
    function getdata()
    {
        return ["name"=>"Aqib", "email"=> "aqib123@gamil.com", "address"=>"Pakistan"];
    }
}
