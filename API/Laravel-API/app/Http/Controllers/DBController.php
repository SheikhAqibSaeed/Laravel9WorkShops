<?php

namespace App\Http\Controllers;

use App\Models\ClientModel;
use Illuminate\Http\Request;

class DBController extends Controller
{
    // Get data with API form DB
    function list()
    {
        return ClientModel::all();
    }

    //      Get API with Parameter
    function listparam($id=null)
    {
        return ClientModel::find($id);
    }
}
