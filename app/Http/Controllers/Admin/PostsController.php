<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::published()->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        $categories = Category::all();
//        $areas = Area::all();
//        return view('admin.posts.create',compact('categories','areas'));
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request,['title' => 'required']);
        $post = auth()->user()->createPost($request->all());
        return redirect()->route('admin.posts.edit', compact('post'));
    }
//    public function store(Request $request)
//    {
//
//        $this->validate($request,[
//            'title' => 'required',
//            'excerpt' => 'required',
//           // 'pdfbook' => 'required|file|mimes:pdf|max:5000000',
//            'areas' => 'required',
//            'categories' => 'required',
//        ]);
//
//        $post = new Document;
//        $post->title = $request->get('title');
//        $post->excerpt = $request->get('excerpt');
//        $post->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at')) : Carbon::now();
//        $post->user_id = $request->user()->id;
//        $post->save();
//
//        $post->categories()->attach($request->get('categories'));
//        $post->areas()->attach($request->get('areas'));
//        $post->save();
//
////        if($request->hasFile('pdfbook')){
////            $post->pdfbook = $request->file('pdfbook')->store('posts','public');
////            $post->save();
////        }
//        $request->session()->flash('success','El posto "'.$post->title.'" ha sido creado');
//        return redirect()->route('posts.index');
//    }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $areas = Area::all();
        return view('admin.posts.edit',compact('categories','areas','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'title' => 'required',
            'excerpt' => 'required',
           // 'pdfbook' => 'required|file|mimes:pdf|max:5000000',
            'areas' => 'required',
            'categories' => 'required',
        ]);

        $post->title = $request->get('title');
        $post->excerpt = $request->get('excerpt');
        $post->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at')) : Carbon::now();
        $post->user_id = $request->user()->id;
        $post->save();

        $post->categories()->sync($request->get('categories'));
        $post->areas()->sync($request->get('areas'));
        $post->save();

//        if($request->hasFile('pdfbook')){
//            $post->pdfbook = $request->file('pdfbook')->store('posts','public');
//            $post->save();
//        }
        return redirect()->route('admin.posts.edit',$post)->with('success','El post ha sido Guardado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
