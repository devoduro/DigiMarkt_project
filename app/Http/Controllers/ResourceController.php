<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resources.
     */
    public function index(Request $request)
    {
        $query = Document::query()->where('is_public', true);

        // Apply filters
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Get all categories for the filter
        $categories = Document::where('is_public', true)
            ->distinct()
            ->pluck('category')
            ->filter()
            ->values();

        // Get public resources
        $resources = $query->latest()->paginate(9);

        return view('pages.resources.index', compact('resources', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $resource)
    {
        // Check if the resource is public
        if (!$resource->is_public) {
            abort(404);
        }

        // Get related resources in the same category
        $relatedResources = Document::where('category', $resource->category)
            ->where('id', '!=', $resource->id)
            ->where('is_public', true)
            ->take(3)
            ->get();

        return view('pages.resources.show', compact('resource', 'relatedResources'));
    }
}
