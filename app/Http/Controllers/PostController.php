<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\view;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //



        $posts = post::with('tags')->paginate(1);
        $tags=Tag::with('posts')->get();
      // $tags = Tag::whereIn('id', 'tag_id')->get();
    //  $tags=post::with('tags')->tags();
       return view('blog.index',compact('posts','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags=Tag::all();
        return view('blog.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $requestData = $request->all();
        $fileName = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $requestData["image"] = '/storage/'.$path;



        $post = new post([
            'title' => $request->title,
            'subject' => $request->subject,
            'image'=>$requestData['image'],
        ]);

        $post->save();

     // Associate the tags with the post

    if (!empty($requestData['tags'])) {

        $tags = Tag::whereIn('id', $requestData['tags'])->get();
        $post->tags()->sync($tags->pluck('id'));


    }
    return redirect()->route('index')->with('status','Your POst created successfully ');







        /*
        if (!empty($requestData['tags'])) {
            $tags = Tag::whereIn('id', $requestData['tags'])->get();
            $post->tags()->sync($tags);
        }
        */
        /*
    $tagNames = explode(',', $request->tags);
    foreach ($tagNames as $tagName) {
        $tag = Tag::firstOrCreate(['name' => $tagName]);
        $requestData->tags()->attach($tag);
    }
    $post = new Post();
    $post->title = $validatedData['title'];
    $post->content =$validatedData['content'];
    $post->save();

    // Associate the tags with the post
    if (!empty($validatedData['tags'])) {
        $tags = collect($validatedData['tags'])->map(function ($tagName) {
            return Tag::firstOrCreate(['name' => $tagName]);
        });

        $post->tags()->sync($tags->pluck('id'));
    }
     $tags = collect($requestData['tags'])->map(function ($tagName) {
        return Tag::firstOrCreate(['name' => $tagName]);
    });

    */


       /* Post::create($requestData);*/

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
    public function edit(Post $post)
    {
        //
        return view('blog.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        //
        $requestData = $request->all();

       $post->update($requestData);
       return redirect()->route('home') ->with('msg','Your data Updated Successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
