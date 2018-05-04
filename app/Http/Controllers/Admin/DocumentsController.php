<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Http\Controllers\Controller;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DocumentsController extends Controller
{
    public function store(Post $post)
    {
       // $uniqueFileName = uniqid() . request()->get('upload_file')->getClientOriginalName() . '.' . request()->get('upload_file')->getClientOriginalExtension();

        $this->validate(request(),[
            'documento' => 'required|file|mimes:pdf|max:31250',
        ]);

        $documento = request()->file('documento')->store('documents','public');
        Document::create([
            'url' => Storage::url($documento),
            'name' => request()->file('documento')->getClientOriginalName(),
            'post_id' => $post->id
        ]);

    }
}
