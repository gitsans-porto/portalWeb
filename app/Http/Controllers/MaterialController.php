<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        // Get all subjects
        $subjects = Subject::all();
        return view('materials.index', compact('subjects'));
    }

    public function show(Subject $subject)
    {
        // Get materials for the subject, grouped by grade if needed
        $materials = $subject->materials()->latest()->get();
        return view('materials.show', compact('subject', 'materials'));
    }

}
