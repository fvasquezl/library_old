<?php

namespace App\Http\Controllers;


class ShowPostController extends Controller
{
    public function __invoke(Post $post, $url)
    {
        if($post->slug != $url){
            return redirect($post->url,301);
        }
        return view('posts.show',compact('$post'));
    }
}
