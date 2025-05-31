<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Milestone;
use App\Models\MilestoneDeliverable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $milestones = Milestone::with(['creator', 'deliverables'])
            ->orderBy('display_order')
            ->paginate(10);
            
        return view('admin.milestones.index', compact('milestones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.milestones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:upcoming,in-progress,completed',
            'completion_percentage' => 'required|integer|min:0|max:100',
            'display_order' => 'nullable|integer|min:0',
            'deliverable_titles.*' => 'nullable|string|max:255',
            'deliverable_files.*' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip|max:10240',
            'deliverable_restricted.*' => 'nullable|boolean',
        ]);

        $milestone = Milestone::create([
            'title' => $validated['title'],
            'date' => $validated['date'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'completion_percentage' => $validated['completion_percentage'],
            'display_order' => $validated['display_order'] ?? 0,
            'created_by' => auth()->id(),
        ]);

        // Handle deliverable uploads
        if ($request->has('deliverable_titles')) {
            foreach ($request->deliverable_titles as $index => $title) {
                if (empty($title)) continue;
                
                $filePath = null;
                $fileName = null;
                
                if ($request->hasFile('deliverable_files') && isset($request->file('deliverable_files')[$index])) {
                    $file = $request->file('deliverable_files')[$index];
                    $filePath = $file->store('milestone_deliverables', 'public');
                    $fileName = $file->getClientOriginalName();
                }
                
                MilestoneDeliverable::create([
                    'milestone_id' => $milestone->id,
                    'title' => $title,
                    'file_path' => $filePath,
                    'file_name' => $fileName,
                    'restricted' => isset($request->deliverable_restricted[$index]),
                    'display_order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.milestones.index')
            ->with('success', 'Milestone created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Milestone $milestone)
    {
        $milestone->load(['creator', 'deliverables']);
        return view('admin.milestones.show', compact('milestone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Milestone $milestone)
    {
        $milestone->load('deliverables');
        return view('admin.milestones.edit', compact('milestone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Milestone $milestone)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:upcoming,in-progress,completed',
            'completion_percentage' => 'required|integer|min:0|max:100',
            'display_order' => 'nullable|integer|min:0',
            'deliverable_titles.*' => 'nullable|string|max:255',
            'deliverable_files.*' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip|max:10240',
            'deliverable_restricted.*' => 'nullable|boolean',
        ]);

        $milestone->update([
            'title' => $validated['title'],
            'date' => $validated['date'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'completion_percentage' => $validated['completion_percentage'],
            'display_order' => $validated['display_order'] ?? $milestone->display_order,
        ]);

        // Handle existing deliverables
        if ($request->has('existing_deliverable_ids')) {
            foreach ($request->existing_deliverable_ids as $index => $id) {
                $deliverable = MilestoneDeliverable::find($id);
                if (!$deliverable) continue;
                
                $data = [
                    'title' => $request->existing_deliverable_titles[$index],
                    'restricted' => isset($request->existing_deliverable_restricted[$index]),
                    'display_order' => $index,
                ];
                
                if ($request->hasFile('existing_deliverable_files') && 
                    isset($request->file('existing_deliverable_files')[$index])) {
                    
                    // Delete old file if exists
                    if ($deliverable->file_path) {
                        Storage::disk('public')->delete($deliverable->file_path);
                    }
                    
                    $file = $request->file('existing_deliverable_files')[$index];
                    $data['file_path'] = $file->store('milestone_deliverables', 'public');
                    $data['file_name'] = $file->getClientOriginalName();
                }
                
                $deliverable->update($data);
            }
        }

        // Handle new deliverables
        if ($request->has('deliverable_titles')) {
            foreach ($request->deliverable_titles as $index => $title) {
                if (empty($title)) continue;
                
                $filePath = null;
                $fileName = null;
                
                if ($request->hasFile('deliverable_files') && isset($request->file('deliverable_files')[$index])) {
                    $file = $request->file('deliverable_files')[$index];
                    $filePath = $file->store('milestone_deliverables', 'public');
                    $fileName = $file->getClientOriginalName();
                }
                
                MilestoneDeliverable::create([
                    'milestone_id' => $milestone->id,
                    'title' => $title,
                    'file_path' => $filePath,
                    'file_name' => $fileName,
                    'restricted' => isset($request->deliverable_restricted[$index]),
                    'display_order' => $index + $milestone->deliverables->count(),
                ]);
            }
        }

        // Handle deliverable deletions
        if ($request->has('delete_deliverables')) {
            foreach ($request->delete_deliverables as $deliverableId) {
                $deliverable = MilestoneDeliverable::find($deliverableId);
                if ($deliverable) {
                    if ($deliverable->file_path) {
                        Storage::disk('public')->delete($deliverable->file_path);
                    }
                    $deliverable->delete();
                }
            }
        }

        return redirect()->route('admin.milestones.index')
            ->with('success', 'Milestone updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Milestone $milestone)
    {
        // Delete associated deliverable files from storage
        foreach ($milestone->deliverables as $deliverable) {
            if ($deliverable->file_path) {
                Storage::disk('public')->delete($deliverable->file_path);
            }
        }
        
        $milestone->delete();

        return redirect()->route('admin.milestones.index')
            ->with('success', 'Milestone deleted successfully.');
    }
    
    /**
     * Update the display order of milestones.
     */
    public function updateOrder(Request $request)
    {
        $validated = $request->validate([
            'milestones' => 'required|array',
            'milestones.*.id' => 'required|exists:milestones,id',
            'milestones.*.order' => 'required|integer|min:0',
        ]);
        
        foreach ($validated['milestones'] as $item) {
            Milestone::where('id', $item['id'])->update(['display_order' => $item['order']]);
        }
        
        return response()->json(['success' => true]);
    }
}
