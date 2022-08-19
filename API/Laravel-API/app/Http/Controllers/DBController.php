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

    // Put API
    //Save data in database using Put Method
    function update(Request $req)
    {
        $clientmodel = ClientModel::find($req->id);
        $clientmodel->name=$req->name;
        $clientmodel->email=$req->email;
        $result=$clientmodel->save();
        if($result)
        {
            return ["Result"=>"Data Updated Successfully"];
        }
        else
        {
            return ["Result"=>"Data Update Failed"];
        }
    }

    // Search data in database using API in LARAVEL
    function search($name)
    {
        // ("name", "like", "%" . $name . "%") means if one latter search then also Details show
        return ClientModel::where("name", "like", "%" . $name . "%")->get();
    }

    //  Delete Data using API in LARAVEL
    function delete($id)
    {
        $clientmodel = ClientModel::find($id);
        $result = $clientmodel->delete();
        if($result)
        {
            return ["return"=> "Data Deleted Successfully.."];
        }
        else
        {
            return ["return"=> "Data Deleted Failed.."];

        }
    }
}
