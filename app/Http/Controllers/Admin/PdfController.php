<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use App\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PdfController extends Controller
{
    public function store(Document $document)
    {
        $this->validate(request(),[
            'documento' => 'required|file|mimes:pdf|max:31250',
        ]);
        $pdf = request()->file('documento')->store('documents','public');

        Pdf::create([
            'url' => Storage::url($pdf),
            'document_id' => $document->id
        ]);

    }
}
