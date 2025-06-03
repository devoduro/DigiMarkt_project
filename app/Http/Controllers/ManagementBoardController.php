<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementBoardController extends Controller
{
    /**
     * Display the management board page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('management_board');
    }
}
