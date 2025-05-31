<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the documents.
     */
    public function index(Request $request)
    {
        $query = Document::query()->with('uploader');

        // Apply filters
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Apply sorting
        $sort = $request->sort ?? 'newest';
        switch ($sort) {
            case 'oldest':
                $query->oldest();
                break;
            case 'name_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('title', 'desc');
                break;
            case 'downloads':
                $query->withCount('downloads')->orderBy('downloads_count', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $documents = $query->paginate(10);

        return view('admin.documents', compact('documents'));
    }

    /**
     * Store a newly created document in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'document' => 'required|file|max:10240', // 10MB max
            'is_public' => 'boolean',
        ]);

        // Store the file
        $file = $request->file('document');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('documents');
        $fileSize = $file->getSize();
        $fileType = $file->getMimeType();

        // Create the document record
        Document::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_size' => $fileSize,
            'file_type' => $fileType,
            'category' => $request->category,
            'is_public' => $request->has('is_public'),
            'uploaded_by' => auth()->id(),
        ]);

        return redirect()->route('admin.documents')->with('success', 'Document uploaded successfully.');
    }

    /**
     * Update the specified document in storage.
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'document' => 'nullable|file|max:10240', // 10MB max
            'is_public' => 'boolean',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'is_public' => $request->has('is_public'),
        ];

        // If a new file is uploaded, update the file info
        if ($request->hasFile('document')) {
            // Delete the old file
            Storage::delete($document->file_path);

            // Store the new file
            $file = $request->file('document');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('documents');
            $fileSize = $file->getSize();
            $fileType = $file->getMimeType();

            $data['file_path'] = $filePath;
            $data['file_name'] = $fileName;
            $data['file_size'] = $fileSize;
            $data['file_type'] = $fileType;
        }

        $document->update($data);

        return redirect()->route('admin.documents')->with('success', 'Document updated successfully.');
    }

    /**
     * Remove the specified document from storage.
     */
    public function destroy(Document $document)
    {
        // Delete the file
        Storage::delete($document->file_path);

        // Delete the document record
        $document->delete();

        return redirect()->route('admin.documents')->with('success', 'Document deleted successfully.');
    }
}
