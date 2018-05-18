<?php

namespace App\Http\Controllers;

use App\Area;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $area = auth()->user()->area;
        $areas = array_prepend($area->getAllChildrenFromArea($area),'1');
        $posts = Post::query()
            ->with('areas','owner','categories')
            ->unless(auth()->user()->isAdmin(),function ($q) use ($areas){
                    $q->whereHas('areas',function ($q1) use ($areas){
                    $q1->whereIn('area_id',$areas);
                });
            })->orderBy('created_at', 'desc')
            ->get();
        return view('posts.index', compact('posts'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }
}
