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
        // Get all majors and count their published materials
        $majors = \App\Models\Major::all()->map(function ($major) {
            $major->materials_count = Material::where('major', $major->name)
                                            ->where('status', 'published')
                                            ->count();
            return $major;
        });
        
        return view('materials.index', compact('majors'));
    }

    public function show(\App\Models\Major $major)
    {
        $materials = Material::with('subject')
                            ->where('major', $major->name)
                            ->where('status', 'published')
                            ->latest()->get();
        
        // Extract unique subjects for this major's materials for the JS filter dropdown
        $uniqueSubjects = $materials->pluck('subject.name')->unique()->values();

        return view('materials.show', compact('major', 'materials', 'uniqueSubjects'));
    }

}
