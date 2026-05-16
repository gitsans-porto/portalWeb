<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with('subject')->latest()->get();
        $subjects = Subject::all();
        return view('admin.materials.index', compact('materials', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'title' => 'required|string|max:255',
            'teacher_name' => 'nullable|string|max:255',
            'file' => 'required|file|mimes:pdf,ppt,pptx|max:10240',
            'grade' => 'required|in:10,11,12',
            'major' => 'nullable|string|max:255',
        ]);

        $file = $request->file('file');
        $path = $file->store('materials', 'public');
        $type = $file->getClientOriginalExtension();

        Material::create([
            'subject_id' => $request->subject_id,
            'title' => $request->title,
            'teacher_name' => $request->teacher_name,
            'file_path' => $path,
            'file_type' => $type,
            'grade' => $request->grade,
            'major' => $request->major,
        ]);

        return redirect()->back()->with('success', 'Materi berhasil diunggah.');
    }

    public function destroy(Material $material)
    {
        if ($material->file_path) {
            Storage::disk('public')->delete($material->file_path);
        }
        $material->delete();

        return redirect()->back()->with('success', 'Materi berhasil dihapus.');
    }
}
