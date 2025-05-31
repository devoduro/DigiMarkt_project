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
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role !== 'admin') {
                return redirect()->route('home')->with('error', 'You do not have permission to access this area.');
            }
            return $next($request);
        });
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
        // Log the incoming request data for debugging
        logger()->info('Deliverable creation request data:', $request->all());
        
        // Validate with conditional rules for new category
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|max:10240', // 10MB max
            'access_level' => 'required|string|in:public,registered,admin',
            // Remove boolean validation for is_published as checkboxes send 'on' not true/false
            'is_published' => 'sometimes',
        ];
        
        // Add category validation based on selection
        if ($request->category === 'new') {
            $rules['new_category'] = 'required|string|max:50';
        } else {
            $rules['category'] = 'required|string|max:50';
        }
        
        try {
            $validated = $request->validate($rules);
            logger()->info('Validation passed');
            
            // Store the file
            $file = $request->file('file');
            if (!$file) {
                throw new \Exception('File upload is missing');
            }
            
            logger()->info('File details:', [
                'original_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'error' => $file->getError()
            ]);
            
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('documents', 'public'); // Store in public disk for accessibility
            
            if (!$filePath) {
                throw new \Exception('Failed to store the file');
            }
            
            logger()->info('File stored at: ' . $filePath);
            
            $fileSize = $file->getSize();
            $fileType = $file->getMimeType();

            // Determine the category (existing or new)
            $category = $request->category;
            if ($request->category === 'new' && $request->filled('new_category')) {
                $category = $request->new_category;
                logger()->info('Using new category: ' . $category);
            } else {
                logger()->info('Using existing category: ' . $category);
            }
            
            // Create the document record
            $document = Document::create([
                'title' => $request->title,
                'description' => $request->description,
                'file_path' => $filePath,
                'file_name' => $fileName,
                'file_size' => $fileSize,
                'file_type' => $fileType,
                'category' => $category,
                'access_level' => $request->access_level,
                // Convert checkbox 'on' value to boolean true
                'is_published' => $request->has('is_published'),
                'uploaded_by' => auth()->id(),
            ]);
            
            logger()->info('Document created with ID: ' . $document->id);

            return redirect()->route('admin.deliverables.index')->with('success', 'Deliverable uploaded successfully.');
        } catch (\Exception $e) {
            // Log the error with detailed information
            logger()->error('Error creating deliverable: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Return with error message
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to upload deliverable: ' . $e->getMessage());
        }
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
    public function update(Request $request, $id)
    {
        // Find the document
        $document = Document::findOrFail($id);
        
        // Validate with conditional rules for new category
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|max:10240', // 10MB max, optional on update
            'access_level' => 'required|string|in:public,registered,admin',
            // Remove boolean validation for is_published as checkboxes send 'on' not true/false
            'is_published' => 'sometimes',
        ];
        
        // Add category validation based on selection
        if ($request->category === 'new') {
            $rules['new_category'] = 'required|string|max:50';
        } else {
            $rules['category'] = 'required|string|max:50';
        }
        
        $validated = $request->validate($rules);

        try {
            // Determine the category (existing or new)
            $category = $request->category;
            if ($request->category === 'new' && $request->filled('new_category')) {
                $category = $request->new_category;
            }
            
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'category' => $category,
                'access_level' => $request->access_level,
                // Convert checkbox 'on' value to boolean true
                'is_published' => $request->has('is_published'),
            ];

            // If a new file is uploaded, update the file info
            if ($request->hasFile('file')) {
                // Delete the old file
                if (Storage::disk('public')->exists($document->file_path)) {
                    Storage::disk('public')->delete($document->file_path);
                }

                // Store the new file
                $file = $request->file('file');
                $fileName = $file->getClientOriginalName();
                $filePath = $file->store('documents', 'public'); // Store in public disk for accessibility
                $fileSize = $file->getSize();
                $fileType = $file->getMimeType();

                $data['file_path'] = $filePath;
                $data['file_name'] = $fileName;
                $data['file_size'] = $fileSize;
                $data['file_type'] = $fileType;
            }

            $document->update($data);

            return redirect()->route('admin.deliverables.index')->with('success', 'Deliverable updated successfully.');
        } catch (\Exception $e) {
            // Log the error with detailed information
            logger()->error('Error updating deliverable: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Return with error message
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update deliverable: ' . $e->getMessage());
        }
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
