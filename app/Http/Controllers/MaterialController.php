<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        // Get all subjects with their materials count
        $subjects = Subject::all();
        return view('materials.index', compact('subjects'));
    }

}
