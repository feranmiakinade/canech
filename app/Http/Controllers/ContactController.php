<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'company' => 'nullable|string|max:255',
            'project_type' => 'required|string|max:255',
            'budget' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactSubmission::create($validated);

        return back()->with('success', 'Thanks! Your enquiry has been received.');
    }
}