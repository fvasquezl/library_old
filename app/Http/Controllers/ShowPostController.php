<?php

namespace App\Http\Controllers;


use App\Post;

class ShowPostController extends Controller
{
    public function __invoke(Post $post)
    {
        return view('posts.show',compact('post'));
    }
}
