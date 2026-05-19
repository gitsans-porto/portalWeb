<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Handle image upload from TinyMCE
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:200',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads/tinymce', 'public');
            return response()->json(['location' => asset('storage/' . $path)]);
        }

        return response()->json(['error' => 'File upload failed'], 400);
    }
}
