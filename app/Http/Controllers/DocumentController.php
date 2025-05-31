<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Apply auth middleware to all methods except those specified
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the documents.
     */
    public function index()
    {
        // Get documents, public ones for guests and all for authenticated users
        if (auth()->check()) {
            $documents = Document::latest()->paginate(12);
        } else {
            $documents = Document::where('is_public', true)->latest()->paginate(12);
        }

        return view('documents.index', compact('documents'));
    }

    /**
     * Download a document.
     */
    public function download(Document $document)
    {
        // Check if the user can access this document
        if (!$document->isAccessibleBy(auth()->user())) {
            abort(403, 'You do not have permission to access this document.');
        }

        // Record the download
        Download::create([
            'user_id' => auth()->id(),
            'document_id' => $document->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        // Check if the file exists
        if (!Storage::exists($document->file_path)) {
            abort(404, 'File not found.');
        }

        // Return the file as a download
        return Storage::download(
            $document->file_path, 
            $document->file_name, 
            ['Content-Type' => Storage::mimeType($document->file_path)]
        );
    }

    /**
     * Show the document details.
     */
    public function show(Document $document)
    {
        // Check if the user can access this document
        if (!$document->isAccessibleBy(auth()->user())) {
            abort(403, 'You do not have permission to access this document.');
        }

        return view('documents.show', compact('document'));
    }
}
