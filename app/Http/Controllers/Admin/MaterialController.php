<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Material;
use App\Models\Subject;
use App\Models\SubjectCurriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $materials   = Material::with('subject')->latest()->get();
        $subjects    = Subject::with('curriculums.major')->get();
        $majors      = Major::all();
        $curriculums = SubjectCurriculum::with(['subject', 'major'])->get();

        return view('admin.materials.index', compact('materials', 'subjects', 'majors', 'curriculums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id'   => 'required|exists:subjects,id',
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'teacher_name' => 'nullable|string|max:255',
            'material_type' => 'required|in:file,link',
            'file'         => 'required_if:material_type,file|nullable|file|mimes:pdf,ppt,pptx|max:10240',
            'file_url'     => 'required_if:material_type,link|nullable|url',
            'status'       => 'required|in:published,draft',
        ]);

        $path     = null;
        $fileType = 'link';

        if ($request->material_type === 'file' && $request->hasFile('file')) {
            $file     = $request->file('file');
            $path     = $file->store('materials', 'public');
            $fileType = $file->getClientOriginalExtension();
        } elseif ($request->material_type === 'link') {
            $fileType = 'link';
        }

        // Ambil info grade & major dari kurikulum jika ada
        $grade = null;
        $major = null;
        $curriculum = SubjectCurriculum::with('major')
            ->where('subject_id', $request->subject_id)
            ->first();
        if ($curriculum) {
            $grade = $curriculum->grade;
            $major = $curriculum->major->name ?? null;
        }

        Material::create([
            'subject_id'   => $request->subject_id,
            'title'        => $request->title,
            'description'  => $request->description,
            'teacher_name' => $request->teacher_name,
            'file_path'    => $path,
            'file_url'     => $request->material_type === 'link' ? $request->file_url : null,
            'file_type'    => $fileType,
            'status'       => $request->status,
            'grade'        => $grade,
            'major'        => $major,
        ]);

        return redirect()->back()->with('success', 'Materi berhasil ' . ($request->status === 'published' ? 'dipublikasikan.' : 'disimpan sebagai draf.'));
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
