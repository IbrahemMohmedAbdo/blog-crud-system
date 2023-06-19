<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //

    public function master(post $post){

        $tags = $post->tags;


        return view('blog.content',compact('post','tags'));
    }

    public function index(Request $request ,post $post){


        $posts = post::with('tags')->paginate(1);
        $tags=Tag::with('posts')->get();

      //  $tags = $post->tags;
      //  $tags = Tag::whereIn('id', $request['tags'])->get();
        return view('blog.index',compact('posts','tags'));
    }
    public function about(){
        return view('blog.about');
    }
    public function contact(){
        return view('blog.contact');
    }









}
