<?php

namespace App\Http\Controllers;

use App\Models\WorkPackage;
use Illuminate\Http\Request;

class WorkPackageController extends Controller
{
    /**
     * Display the public work packages page
     */
    public function index()
    {
        $workPackages = WorkPackage::with('creator')
            ->where('is_published', true)
            ->orderBy('display_order')
            ->paginate(12);
            
        return view('work-packages.index', compact('workPackages'));
    }
}
