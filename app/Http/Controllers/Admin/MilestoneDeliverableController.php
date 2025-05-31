<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Milestone;
use App\Models\MilestoneDeliverable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MilestoneDeliverableController extends Controller
{
    /**
     * Display a listing of the deliverables for a milestone.
     *
     * @param  \App\Models\Milestone  $milestone
     * @return \Illuminate\Http\Response
     */
    public function index(Milestone $milestone)
    {
        return view('admin.milestones.deliverables.index', compact('milestone'));
    }

    /**
     * Show the form for creating a new deliverable.
     *
     * @param  \App\Models\Milestone  $milestone
     * @return \Illuminate\Http\Response
     */
    public function create(Milestone $milestone)
    {
        return view('admin.milestones.deliverables.create', compact('milestone'));
    }

    /**
     * Store a newly created deliverable in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Milestone  $milestone
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Milestone $milestone)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
        ]);

        $deliverable = new MilestoneDeliverable([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'),
            'created_by' => Auth::id(),
        ]);

        $milestone->deliverables()->save($deliverable);

        return redirect()->route('admin.milestones.deliverables.index', $milestone)
            ->with('success', 'Deliverable created successfully.');
    }

    /**
     * Show the form for editing the specified deliverable.
     *
     * @param  \App\Models\Milestone  $milestone
     * @param  \App\Models\MilestoneDeliverable  $deliverable
     * @return \Illuminate\Http\Response
     */
    public function edit(Milestone $milestone, MilestoneDeliverable $deliverable)
    {
        return view('admin.milestones.deliverables.edit', compact('milestone', 'deliverable'));
    }

    /**
     * Update the specified deliverable in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Milestone  $milestone
     * @param  \App\Models\MilestoneDeliverable  $deliverable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Milestone $milestone, MilestoneDeliverable $deliverable)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
        ]);

        $deliverable->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('admin.milestones.deliverables.index', $milestone)
            ->with('success', 'Deliverable updated successfully.');
    }

    /**
     * Remove the specified deliverable from storage.
     *
     * @param  \App\Models\Milestone  $milestone
     * @param  \App\Models\MilestoneDeliverable  $deliverable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Milestone $milestone, MilestoneDeliverable $deliverable)
    {
        $deliverable->delete();

        return redirect()->route('admin.milestones.deliverables.index', $milestone)
            ->with('success', 'Deliverable deleted successfully.');
    }

    /**
     * Toggle the completed status of the deliverable.
     *
     * @param  \App\Models\Milestone  $milestone
     * @param  \App\Models\MilestoneDeliverable  $deliverable
     * @return \Illuminate\Http\Response
     */
    public function toggleCompleted(Milestone $milestone, MilestoneDeliverable $deliverable)
    {
        $deliverable->update([
            'completed' => !$deliverable->completed
        ]);

        return redirect()->route('admin.milestones.deliverables.index', $milestone)
            ->with('success', 'Deliverable status updated successfully.');
    }
}
