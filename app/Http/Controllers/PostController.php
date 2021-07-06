<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('parent_id', null)->latest()->get();

        return view('posts._index', compact('posts'));

    }// end of index

    public function store(PostRequest $request)
    {
        $requestData = $request->validated();

        if ($request->image) {
            $request->image->store('public/uploads');
            $requestData['image'] = $request->image->hashName();
        }

        Post::create($requestData);

        return redirect()->route('posts.index');

    }// end of store


}//end of controller
