<?php

namespace App\Http\Controllers;
use App\Http\Requests\Post\CreateRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Http\Controllers\Toast;
use App\Routes\Web;
use App\Scopes\PostScope;
use Brian2694\Toastr\Facades\Toastr;
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

        // withTrashed() Jo delete hui ho wo displsy ni hoti
        // active()->
        $posts = Post::withTrashed()->paginate(5);  // Previous & Next Pages

        // onlyTrashed() jo delete ni hui hoti
        // $posts = Post::onlyTrashed()->paginate(5);
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
    public function store(PostRequest $request)
    {
        //  Store image in DB
        $file = $request->file;
        if($file){
            $fileName = time(). '-' .$file->getClientOriginalName();
            $filePath = public_path(). '/assets/images';
            $file->move($filePath, $fileName);
            // dd($filePath);

            Post::create([
                'file' => $fileName,
                'title' => $request->title,
                'user_id' => 1,
                'description' => $request->description,
                'is_publish'=> $request->is_publish,
                'is_active' => $request->is_active
            ]);
        }


        // Post::create($request->all());
        //      or
        //  One to One Relationship

        // dd('Insert Successfully');

        $request->session()->flash('alert-success', 'Post Saved Seccessfully!');
        //  Old version route
        // return redirect()->route('posts.create');

        // New version route
        return to_route('posts.index');
        {
            Toastr::success('Post added successfully :)','Success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Post::all();
        // return Post::withoutGlobalScope(new PostScope)->get();
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
    public function update(PostRequest $request, $id)
    {

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
        $request->session()->flash('alert-success', 'Post Delete Successfully');
        return to_route('posts.index');

    }

    public function softDelete(Request $request, $id)
    {
        // return $id;
        $post = Post::onlyTrashed()->find($id);
        if(! $post){
            abort(404);
        }
        // return $post;
        $post->update([
            'deleted_at' => null
        ]);
        $request->session()->flash('alert-message', 'Post Recovered Successfully');
        return to_route('posts.index');
    }
}
