<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class ListPostController extends Controller
{
    public function __invoke(Category $category= null, Request $request)
    {
        list($orderColumn,$orderDirection) = $this->getListOrder($request->get('orden'));
        $posts = Post::query()
            ->with(['user','category'])
            ->fromCategory($category)
            ->fromSearch($request->get('search'))
            ->scopes($this->getRouteScope($request))
            ->orderBy($orderColumn, $orderDirection)
            ->paginate()
            ->appends(array_filter($request->only(['orden'])));
        return view('posts.index', compact('posts', 'category'));
    }
    protected function getRouteScope(Request $request)
    {
        $scopes = [
            'posts.mine' => ['byUser' => [$request->user()]],
            'posts.pending' => ['pending'],
            'posts.completed' => ['completed']
        ];
        return $scopes[$request->route()->getName()] ?? [];
    }
    protected function getListOrder($order)
    {
        $orders = [
            'recientes' => ['created_at', 'desc'],
            'antiguos' => ['created_at', 'asc'],
        ];
        return $orders[$order] ?? ['created_at', 'desc'];
    }
}
