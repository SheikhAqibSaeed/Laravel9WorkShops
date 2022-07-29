<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Routes\Web;
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
        // $posts = Post::all();
        // $posts = Post::get();
        // $posts = Post::paginate(10);
        $posts = Post::simplepaginate(5);  // Previous & Next Pages


        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:12',
            'description' => 'required|min:10|max:100',
            'is_publish' => 'required',
            'is_active' => 'required'
        ]);

        Post::create($request->all());

        // dd('Insert Successfully');

        $request->session()->flash('alert-success', 'Post Saved Seccessfully!');
        //  Old version route
        // return redirect()->route('posts.create');
    
        // New version route
        return to_route('posts.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::find($id);
        if(! $post){
            abort(403);
        }
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);
        if(! $post){
            abort(404);
        }
        return view('posts.edit' , compact('post'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3|max:12',
            'description' => 'required|min:10|max:1000',
            'is_publish' => 'required',
            'is_active' => 'required'
        ]);

        $post = post::find($id);
        if(! $post){
            abort(404);
        }
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_publish'=> $request->is_publish,
            'is_active' => $request->is_active
        ]);
        $request->session()->flash('alert-info', 'Post Updated Successfully');
        return to_route('posts.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = post::find($id);
        if(! $post){
            abort(404);
        }
        $post->delete();
        $request->session()->flash('alert-info', 'Post Delete Successfully');
        return to_route('posts.index');
    
    }
}
