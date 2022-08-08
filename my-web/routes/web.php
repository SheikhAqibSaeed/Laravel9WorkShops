<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Models\User;


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

// Route::get('aqib', function(){
//     $name = 'Sheikh Aqib Saeed';
//     // return view('aqib', ['name' => $name]);
//     // return view('aqib', compact('name'));    // another example passing the key and execute
//     // return view('aqib', compact('name', 'id', 'Color etc' )); // another example
//     // return view('aqib', )->with('name', $name); // another example

//     //Views may also be returned using the View facade:
//     return View::make('aqib', ['name' => $name]);
// });

    //Nested Blade Template
    //How to Open Nested Blade files in Laravel
    // Route::get('/test', function(){
    //     return view('admin.profile'); // also use (.) & (/)
    // });

//Master Layout in Laravel Blade
    // Route::view('master', 'layouts.master');
    // Route::view('test', 'test');
        // Route::view('user', 'user');
        // Route::view('post', 'post');

// Open Blade from Controller
    //  Non-Parameterized Method
    // Route::get('/users', [UserController::class, 'index']);

    //  Parameterized Method
    // Route::get('/users/show/{id}', [UserController::class, 'show']);

// Resource Controller
    //  Create Route for PostController
// Route::resource('posts', PostController::class);

// Connect our Laravel App with Database


// check Laravel App is connected with Database
// Test database connection
// Route::get('/connection', function(){
//     try {
//         DB::connection()->getPdo();
//         return 'Connected Successfully';
//     }
//     catch(\Exception $ex)
//     {
//         dd($ex->get_Massage());
//     }
// });

// Route::get('/connection', function(){
// try {
//     DB::connection()->getPdo();
// } catch (\Exception $ex) {
//     dd($ex->get_Massage());
// }
// });


//  -----Rollback Migrations -----
//  Rollback Migrations in Laravel & how to work
// Command line = php artisan migrate:rollback
//  Rollback jo hy database sy sb Migration delete kr deta hy again create krny k lie Command line
//  php artisan migrate

//  ----remove/drop spacific Column------
// How to remove/drop spacific Column
// php artisan migrate:rollback --path=database/migrations/2022_07_26_122535_add_department_column_into_table.php


// How to Create Foreign Key Using Migration
// please check database/migrations/employee_table
        // Create Foreign Key
    // $table->foreignId('user_id')->constrained();
    // And then execute command line (php artisan migrate:fresh)

//  How to Check Migration Status
    // php artisan migrate:status

// Facing Migration to run in Production
        // Its means that koi migration rehti to ni h
    // php artisan migrate --force

// How to reset migration

    // The migrate:reset command will roll back all of your application's migrations.
    // php artisan migrate:reset

//  Generating Model Classes

// To get started, let's create an Eloquent model. Models typically live in the app\Models
//directory and extend the Illuminate\Database\Eloquent\Model class. You may use the make:model Artisan
//command to generate a new model:

// php artisan make:model Flight

//      generate Model Classes and database migration
//If you would like to generate a database migration when you generate the model, you may use the --migration or -m option:
// Class bhi generate kr dy ga or database bhi
    //php artisan make:model Flight --migration


Route::get('data', function(){
//     Post::create([
//         'Name'=> 'Saqib Saeed',
//         'Phone'=> '124443454',
//         'Adress'=> '#12 3djdskd',
//         'Email'=> 'saqib12344@',
//     ]);


   // Fetch All data from Database
//    $posts = Post::all();

    //  Fetch some data from Database

//    $post = Post::find(4);

   // also Using IF Statement

//    if(! $post){
//     return 'Post Not Found';
//    }

//      How to find through Name,Address etc
//      Use Where means & Operator
// $post = Post::where('Name', 'Aqib Saeed')->where('Phone', '12233454')->get();
//      Use orWhere means or Operator
// $post = Post::where('Name', 'Aqib Saeed')->orwhere('Phone', '122354')->get();

// // also Using IF Statement
//    if(! $post){
//     return 'Post Not Found';
//    }
//    return $post;

//    return 'Insert Completed';

//      Update table from Database
// $post = Post::find(3);
// if(! $post){
//         return 'Post Not Found';
//        }
//        $post->update([
//         'Name' => 'Asif',
//         'Phone' => '0383732',
//         'Adress' => '#2 didkjk',
//         'Email' => 'asif3737@'
//        ]);
//        return 'Update Completed';

//      How to Delete Record from Database
// $post = Post::find(2);
// if(! $post){
//     return 'Record Not Found in Post';
// }
// else {
//     $post->delete();

//     return 'Delete Successfully';
// }

});

//  App\Models\Post;
// How to acess data from Controller
//     1. Insert Data
// Route::get('post', [PostController::class, 'index']);
// Route::get('post/store', [PostController::class, 'store']);
// //      2. Update Data
// Route::get('post/update', [PostController::class, 'update']);
// //      3. Delete Data
// Route::get('post/destroy', [PostController::class, 'destroy']);

//  Create Using in Laravel Using Model


//      url() vs route()
// What is Differece b/w url and route
// What are the benifits

// Route::get('/admin/test-1', function(){
//     return 'test-1';
// })->name('/test.1');

// Route::get('/test-2', function(){
//     return 'test-2';
// })->name('/test.2');

// <!-- static working -->
// <!-- <a href="test-2" class="btn btn-primary">Go</a> -->

// <!-- Dynamic working -->
// <!-- <a href="{{ url('test-2') }}" class="btn btn-primary">Go</a> -->

// <!-- route means jo b hm web sy apna url create krna chahy kr skty ha or wo execute ho jay ga -->
// <!-- BUt url sy aisa ni kr skty  -->
// <!-- <a href="{{ route('/test.1') }}" class="btn btn-primary">Go</a> -->

// Route::resource('posts', PostController::class);

//      Create Session and Forget Session in Laravel
Route::get('test', function(){

    // Session::put('login', 'You are Login');
    //  How to destroy session.
    // Session::forget('login'); // login destroy
    // Session::forget('register'); // registration destroy
    // Session::forget('test');

    // How to all destroy session
    // Session::flush();   // This Session is All Destroy

    // if(Session::has('login')){
    //     return 'session set';
    // }
    // else
    // {
    //     return 'not set';
    // }

});

Route::resource('posts', PostController::class);

// Route::get('posts/soft-delete/{id}', [PostController::class, 'softDelete'])->name('posts.soft-delete');

Route::get('test', function(){
    // $user = User::first();
    // return $user->post;

    // $post = Post::first();
    // return $post->user;

    // $user = User::first();
    // return $user->posts;

    // $user = User::first();
    // return $user;

    // $user = User::first();
    // return $user;

    $user = User::first();
    $role = Role::first();

    // return $user->roles()->attach($role); // Insert data

    // $user->roles()->detach($role);   // Delete data
    // return $user->roles;    // get data

    $user = User::first();

    // $user->roles()->attach([1,2,3]);

    // $user->roles()->detach([1,2]);

    // $user->roles()->sync(3);    // id 3 only show other id's remove
    // return 'Submited';

    // $user = User::first();
    // return $user->image;

    $post = Post::first();
    return $post->tags;

});
