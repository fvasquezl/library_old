<?php

namespace App\Http\Controllers;

use App\Area;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class ListPostsController extends Controller
{
    public function __invoke(Category $category= null, Request $request)
    {
        $posts = Post::query()
            ->with('areas','owner','categories')
            ->fromAreas()
            ->fromSearch($request->get('search'))
            ->Published('created_at', 'desc')
            ->paginate(10);


      $areas = Area::query()
          ->whereIn('id',Area::getAllChildrenFromArea(auth()->user()->area))
          ->get();

      $categories = Category::all();

        return view('posts.index', compact('posts','areas','categories'));
    }

//    protected function getRouteScope(Request $request)
//    {
//        $scopes = [
//            'posts.mine' => ['byUser' => [$request->user()]],
//            'posts.pending' => ['pending'],
//            'posts.completed' => ['completed']
//        ];
//        return $scopes[$request->route()->getName()] ?? [];
//    }
//    protected function getListOrder($order)
//    {
//        $orders = [
//            'recientes' => ['created_at', 'desc'],
//            'antiguos' => ['created_at', 'asc'],
//        ];
//        return $orders[$order] ?? ['created_at', 'desc'];
//    }
}
