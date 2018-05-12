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

        //Un post para un departamento de nivel inferior debe poder ser visto por todos sus
        //padres
        $areas = auth()->user()->areas;
        //$parents ='';

        foreach($areas as $area){
          $parents[] = implode(',',$area->parents->where('id','!=',1)->pluck('id')->toArray());
        }




       return $parents;
    //    return array_splice($parents, -1);

        $posts = Post::with('areas')
            ->whereHas('areas',function($query) use ($area){
            $query->where('area_id',$area)->orwhere('area_id',1);
            })
            ->orderBy('created_at', 'desc')
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
