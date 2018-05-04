<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Http\Controllers\Controller;
use App\Document;
use Illuminate\Support\Facades\Storage;


class DocumentsController extends Controller
{
    public function store(Post $post)
    {

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

    /**
     * @param Document $document
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Document $document)
    {
        dd('hrerere');
        $document->delete();
        return back()->with('success', 'Documento eliminado');
    }
}
