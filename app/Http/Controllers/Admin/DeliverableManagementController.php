<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeliverableManagementController extends Controller
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
     * Display a listing of the deliverables.
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

        $deliverables = $query->paginate(10);
        $categories = Document::distinct()->pluck('category')->filter()->values();

        return view('admin.deliverables.index', compact('deliverables', 'categories'));
    }

    /**
     * Show the form for creating a new deliverable.
     */
    public function create()
    {
        $categories = Document::distinct()->pluck('category')->filter()->values();
        return view('admin.deliverables.create', compact('categories'));
    }

    /**
     * Store a newly created deliverable in storage.
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

        return redirect()->route('admin.deliverables.index')->with('success', 'Deliverable uploaded successfully.');
    }

    /**
     * Show the form for editing the specified deliverable.
     */
    public function edit(Document $deliverable)
    {
        $categories = Document::distinct()->pluck('category')->filter()->values();
        return view('admin.deliverables.edit', compact('deliverable', 'categories'));
    }

    /**
     * Update the specified deliverable in storage.
     */
    public function update(Request $request, Document $deliverable)
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
            Storage::delete($deliverable->file_path);

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

        $deliverable->update($data);

        return redirect()->route('admin.deliverables.index')->with('success', 'Deliverable updated successfully.');
    }

    /**
     * Remove the specified deliverable from storage.
     */
    public function destroy(Document $deliverable)
    {
        // Delete the file
        Storage::delete($deliverable->file_path);

        // Delete the document record
        $deliverable->delete();

        return redirect()->route('admin.deliverables.index')->with('success', 'Deliverable deleted successfully.');
    }

    /**
     * Publish the specified deliverable.
     */
    public function publish(Document $deliverable)
    {
        $deliverable->update(['is_public' => true]);
        return redirect()->route('admin.deliverables.index')->with('success', 'Deliverable published successfully.');
    }

    /**
     * Unpublish the specified deliverable.
     */
    public function unpublish(Document $deliverable)
    {
        $deliverable->update(['is_public' => false]);
        return redirect()->route('admin.deliverables.index')->with('success', 'Deliverable unpublished successfully.');
    }
}
