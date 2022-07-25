<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // return view('test');
        // return 'Getting From Controller';
        return view('aqib');
    
    }
    public function show($id)
    {
        // return 'return from show method';
        return 'User show id is: '. $id;

    }
}
