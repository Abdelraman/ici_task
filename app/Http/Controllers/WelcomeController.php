<?php

namespace App\Http\Controllers;

use App\Models\Post;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('parent_id', null)->latest()->get();
        return view('welcome', compact('posts'));

    }// end of index

}//end of controller
