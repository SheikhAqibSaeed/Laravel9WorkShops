<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/about', function () {
//     return 'Welcome About Page';
// });

//Route Parameters
// Route method – Root URL with ID will match this method

// Route::get('/about/{id}', function ($id) {
//     return 'User id is : ' . $id;
// });

// Route::get('/about/{name?}', function () {
//     return 'Testing';
// });

// Route::get('/user/{name?}',function($name = 'Aqib'){

//     echo "Name: ".$name;
   
//     });

    //Regular Expression Constraints

    // Route::get('/user/{name}', function ($name) {
    //     return "Letter Route Working with Upper Case & Lower Case";
    // })->where('name', '[A-Za-z]+');
     
    // Route::get('/user/{id}', function ($id) {
    //      return 'Route Only Numeric :' . $id; 
    // })->where('id','[0-9]+' );
     
    // Route::get('/user/{id}/{name}', function ($id, $name) {
    //     return 'Numeric and Char';
    // })->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

    // Route::redirect('/', 'login');

    // Route:: get('login', function() {
    //     return 'Login Page';
    // });

    // create about link
    // Route::get('/login', function(){
    //     return '<a href="/about">About</a>';
    // });

    // Click About and then open new page 
    // Route::get('about', function(){
    //     return 'About Page..';
    // });

    // Calling the Route for Views

    // Route::get('aqib', function(){
    //     return view('aqib');
    // });

    // Another Method for calling Route

    // Route:: view('aqib', 'aqib');

//  Pass Dynamic data to Laravel Blade

Route::get('aqib', function(){
    $name = 'Sheikh Aqib Saeed';
    // return view('aqib', ['name' => $name]);  
    // return view('aqib', compact('name'));    // another example passing the key and execute
    // return view('aqib', compact('name', 'id', 'Color etc' )); // another example
    return view('aqib', )->with('name', $name); // another example


});