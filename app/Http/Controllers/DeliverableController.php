<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeliverableController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the deliverables.
     */
    public function index(Request $request)
    {
        $query = Document::query();

        // Apply filters
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Get all categories for the filter
        $categories = Document::distinct()->pluck('category')->filter()->values();

        // Get documents that are accessible by the current user
        $documents = $query->latest()->paginate(9);

        // Filter documents based on access permissions
        $documents->transform(function ($document) {
            if ($document->isAccessibleBy(auth()->user())) {
                return $document;
            }
            return null;
        })->filter();

        return view('pages.deliverables.index', compact('documents', 'categories'));
    }

    /**
     * Display the specified deliverable.
     */
    public function show(Document $deliverable)
    {
        // Check if the user can access this document
        if (!$deliverable->isAccessibleBy(auth()->user())) {
            abort(403, 'You do not have permission to access this document.');
        }

        // Get related documents in the same category
        $relatedDocuments = Document::where('category', $deliverable->category)
            ->where('id', '!=', $deliverable->id)
            ->take(3)
            ->get()
            ->filter(function ($document) {
                return $document->isAccessibleBy(auth()->user());
            });

        return view('pages.deliverables.show', compact('deliverable', 'relatedDocuments'));
    }

    /**
     * Download the specified deliverable.
     */
    public function download(Document $deliverable)
    {
        try {
            // Check if the user can access this document
            if (!$deliverable->isAccessibleBy(auth()->user())) {
                abort(403, 'You do not have permission to download this document.');
            }

            // Check if file exists before proceeding
            if (!Storage::exists($deliverable->file_path)) {
                throw new \Exception('File not found');
            }

            // Record the download
            Download::create([
                'user_id' => auth()->id(),
                'document_id' => $deliverable->id,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);

            // Return the file for download
            return Storage::download(
                $deliverable->file_path,
                $deliverable->file_name,
                [
                    'Content-Type' => $deliverable->file_type,
                ]
            );
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'The file could not be found or accessed.');
        }
    }
}
