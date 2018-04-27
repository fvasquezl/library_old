<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Category;
use App\Document;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::published()->get();
        return view('admin.documents.index', compact('documents'));
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
//        return view('admin.documents.create',compact('categories','areas'));
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
        $document = auth()->user()->createDoc($request->all());
        return redirect()->route('admin.documents.edit', compact('document'));
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
//        $document = new Document;
//        $document->title = $request->get('title');
//        $document->excerpt = $request->get('excerpt');
//        $document->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at')) : Carbon::now();
//        $document->user_id = $request->user()->id;
//        $document->save();
//
//        $document->categories()->attach($request->get('categories'));
//        $document->areas()->attach($request->get('areas'));
//        $document->save();
//
////        if($request->hasFile('pdfbook')){
////            $document->pdfbook = $request->file('pdfbook')->store('documents','public');
////            $document->save();
////        }
//        $request->session()->flash('success','El documento "'.$document->title.'" ha sido creado');
//        return redirect()->route('documents.index');
//    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return view('documents.show',compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $categories = Category::all();
        $areas = Area::all();
        return view('admin.documents.edit',compact('categories','areas','document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $this->validate($request,[
            'title' => 'required',
            'excerpt' => 'required',
           // 'pdfbook' => 'required|file|mimes:pdf|max:5000000',
            'areas' => 'required',
            'categories' => 'required',
        ]);

        $document->title = $request->get('title');
        $document->excerpt = $request->get('excerpt');
        $document->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at')) : Carbon::now();
        $document->user_id = $request->user()->id;
        $document->save();

        $document->categories()->sync($request->get('categories'));
        $document->areas()->sync($request->get('areas'));
        $document->save();

//        if($request->hasFile('pdfbook')){
//            $document->pdfbook = $request->file('pdfbook')->store('documents','public');
//            $document->save();
//        }
        return back()->with('success','El documento ha sido Guardado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
