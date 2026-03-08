<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityEvent;

class CommunityEventController extends Controller
{
     public function create()
    {
        return view('community-events');
    }


     public function store(Request $request)
    {
        //Validating inputs 
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'venue' => 'required|string|max:255',
            'starts_at' => 'required|date',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120', 
        ]);

        
        if ($request->hasFile('banner_image')) {
        
            $bannerPath = $request->file('banner_image')->store('banners', 'public');
        }

        //Saving form data
        CommunityEvent::create([
            'title' => $validated['title'],
            'starts_at' => $validated['starts_at'],
            'venue' => $validated['venue'],
            'description' => $validated['description'],
            'banner_image' => $bannerPath,
        ]);

        //flash message
        return redirect('/dashboard')->with('success', 'Event created successfully');
    }

}



  