<?php

namespace App\Http\Controllers;

use App\Models\ClientModel;
use Illuminate\Http\Request;

class DBController extends Controller
{
    // Get data with API form DB
    // function list()
    // {
    //     return ClientModel::all();
    // }

    //      Get API with Parameter
    // function listparam($id=null)
    // {
    //     return ClientModel::find($id);
    // }

    // Post API
    //Save data in database using POST Method
    function post(Request $req)
    {
        $clientmodel = new ClientModel;
        $clientmodel->name=$req->name;
        $clientmodel->email=$req->email;
        $result=$clientmodel->save();
        if($result)
        {
            return ["Result"=>"Data Post Successfully"];
        }
        else
        {
            return ["Result"=>"Data Post Failed"];
        }

    }
}
