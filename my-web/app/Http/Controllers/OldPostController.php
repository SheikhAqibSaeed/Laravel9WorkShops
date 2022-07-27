<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return $post;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Post::create([
                    'Name'=> 'Saqib Saeed',
                    'Phone'=> '124443454',
                    'Adress'=> '#12 3djdskd',
                    'Email'=> 'saqib12344@',
                ]);

                return 'Insert Successfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $post = Post::find(6);
        $post->update([
                
                    'Name' => 'Aqib',
                    'Phone' => '03333732',
                    'Adress' => '#2 dhsksdkjk',
                    'Email' => 'aqib373@'
                   ]);
                   return 'Update Successfully';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $post = Post::find(6);
        if(! $post){
         return 'Record Not Found in Post';
        }
        else {
        $post->delete();

        return 'Delete Successfully'; 
        }
    }
}
