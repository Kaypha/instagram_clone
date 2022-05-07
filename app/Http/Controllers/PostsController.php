<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        //dd(request()->all());
        $data=request()->validate([
            'book_title'=>'required',
            'description'=>'required',
            'image'=>['required', 'image'],
        ]);

        $imagePath=request('image')->store('uploads','public');
     $image=Image::make(public_path("storage/{$imagePath}"))->fit(300,300);
     $image->save();
        auth()->user()->posts()->create([
            'book_title'=>$data['book_title'],
            'description'=>$data['description'],
            'image'=>$imagePath,

        ]);//get authenticated user, otherwise user_id will throw an error
        return redirect('/profile/'. auth()->user()->id);   //grabbing authenticated user id
        //dd(request()->all());

    }

    public function show( \App\Post $post){
        return view('posts.show',compact('post'));
        //dd($post);
    }
    public function postLikepost(Request $request){
        $post_id=$request['post_id'];
        $is_like=$request['isLike'] ==='true';
        $update=false;
        $post=Post::find($post_id);
        if(!$post){
            return null;
        }
        $user=Auth::user();
    }
}
