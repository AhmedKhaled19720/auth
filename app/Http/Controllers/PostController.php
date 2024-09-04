<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use Auth;
use Illuminate\Auth\Middleware\Authenticate;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $posts=Post::paginate(5);
        return view('posts.index')->with('posts',$posts);
    }



    public function trashed()
    {
        $posts=Post::onlyTrashed()->get();
        return view('posts.trashed')->with('posts',$posts);
    }




    public function create()
    {
        return view('posts.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|string|max:50',
            'description'=>'required|string|max:255',
            'category'=>'required|string|max:70'
        ]);

        $post=Post::create(['user_id'=>Auth::id(),
        'title'=>$request->title,
        'description'=>$request->description,
        'category'=>$request->category,
        'slug'=>Str::slug($request->title),
    ]);
    return redirect()->back()->with('status', 'Post Created successfully!');;

    }

   
    public function show($slug)
    {
       $post=Post::where('slug',$slug)->first();
       return view('posts.show')->with('post',$post);
    }

   
    public function edit($id)
    {
        $post=Post::findOrFail($id);
        return view('posts.edit')->with('post',$post);

    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'title'=>'required|string|max:50',
            'description'=>'required|string|max:255',
            'category'=>'required|string|max:70'
        ]);
    //     $post=Post::find($id);
    //     $post=Post::update([
    //     $post->title=$request->title,
    //     $post->description=$request->description,
    //     $post->category=$request->category,
    //  ]);

    $post = Post::findOrFail($id);
    $post->title = $request->title;
    $post->description = $request->description;
    $post->category = $request->category;
    $post->save();

    return redirect()->back()->with('status', 'Post updated successfully!');
    }

    
    public function destroy( $id)
    {
        $post=Post::find($id);
        $post->delete();
       return redirect()->back();

    }



    public function forceDelete( $id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
       return redirect()->back();

    }


    public function restore( $id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
       return redirect()->back();

    }

}
