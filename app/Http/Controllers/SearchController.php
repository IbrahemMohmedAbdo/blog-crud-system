<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $query= $request->input('query');
        $results=post::where('title','LIKE','%$query%')->
        orWhere('subject','LIKE','%$query%')
        ->get();
        return view('blog.search',compact('results'));


    }
}
