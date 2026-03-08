<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\CommunityEvent;


class DashboardController extends Controller
{
    public function index(): View
    {

        $events = CommunityEvent::orderBy('starts_at', 'asc')->get();

        return view('dashboard', compact('events'));
        
    }
}
