<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Subject;
use App\Models\SubjectCurriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Subject::with('curriculums.major')->latest();

        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $subjects  = $query->get();
        $majors    = Major::withCount('curriculums')->get();
        $curriculums = SubjectCurriculum::with(['subject', 'major'])->get();

        return view('admin.subjects.index', compact('subjects', 'majors', 'curriculums'));
    }

    /* ===================== SUBJECT (MATA PELAJARAN) ===================== */

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'code'     => 'nullable|string|max:20',
            'category' => 'required|in:umum,kejuruan,pilihan',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('subjects', 'public');
        }

        $subject = Subject::create([
            'name'      => $request->name,
            'code'      => $request->code,
            'slug'      => Str::slug($request->name),
            'category'  => $request->category,
            'image'     => $imagePath,
            'icon'      => 'book-open',
            'color'     => 'red',
            'is_active' => false,
        ]);

        // Simpan cakupan kurikulum jika ada
        if ($request->filled('curriculums')) {
            foreach ($request->curriculums as $curr) {
                if (!empty($curr['major_id']) && !empty($curr['grade'])) {
                    if ($curr['major_id'] === 'all') {
                        $allMajors = Major::all();
                        foreach ($allMajors as $major) {
                            SubjectCurriculum::create([
                                'subject_id'   => $subject->id,
                                'major_id'     => $major->id,
                                'grade'        => $curr['grade'],
                                'report_label' => $curr['report_label'] ?? null,
                            ]);
                        }
                    } else {
                        SubjectCurriculum::create([
                            'subject_id'   => $subject->id,
                            'major_id'     => $curr['major_id'],
                            'grade'        => $curr['grade'],
                            'report_label' => $curr['report_label'] ?? null,
                        ]);
                    }
                    // Tandai mapel sebagai aktif jika sudah punya kurikulum
                    $subject->update(['is_active' => true]);
                }
            }
        }

        return redirect()->route('admin.subjects.index', ['tab' => 'mata-pelajaran'])
            ->with('success', 'Mata Pelajaran berhasil ditambahkan.');
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'code'     => 'nullable|string|max:20',
            'category' => 'required|in:umum,kejuruan,pilihan',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $subject->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('subjects', 'public');
        }

        $subject->update([
            'name'     => $request->name,
            'code'     => $request->code,
            'slug'     => Str::slug($request->name),
            'category' => $request->category,
            'image'    => $imagePath,
        ]);

        // Hapus curriculum lama dan buat yang baru
        $subject->curriculums()->delete();
        $subject->update(['is_active' => false]);
        
        if ($request->filled('curriculums')) {
            foreach ($request->curriculums as $curr) {
                if (!empty($curr['major_id']) && !empty($curr['grade'])) {
                    if ($curr['major_id'] === 'all') {
                        $allMajors = Major::all();
                        foreach ($allMajors as $major) {
                            SubjectCurriculum::create([
                                'subject_id'   => $subject->id,
                                'major_id'     => $major->id,
                                'grade'        => $curr['grade'],
                                'report_label' => $curr['report_label'] ?? null,
                            ]);
                        }
                    } else {
                        SubjectCurriculum::create([
                            'subject_id'   => $subject->id,
                            'major_id'     => $curr['major_id'],
                            'grade'        => $curr['grade'],
                            'report_label' => $curr['report_label'] ?? null,
                        ]);
                    }
                    $subject->update(['is_active' => true]);
                }
            }
        }

        return redirect()->route('admin.subjects.index', ['tab' => 'mata-pelajaran'])
            ->with('success', 'Mata Pelajaran berhasil diperbarui.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('admin.subjects.index', ['tab' => 'mata-pelajaran'])
            ->with('success', 'Mata Pelajaran berhasil dihapus.');
    }

    /* ===================== MAJOR (JURUSAN) ===================== */

    public function storeMajor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:20',
        ]);

        Major::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('admin.subjects.index', ['tab' => 'jurusan'])
            ->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function updateMajor(Request $request, Major $major)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:20',
        ]);

        $major->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('admin.subjects.index', ['tab' => 'jurusan'])
            ->with('success', 'Jurusan berhasil diperbarui.');
    }

    public function destroyMajor(Major $major)
    {
        $major->delete();

        return redirect()->route('admin.subjects.index', ['tab' => 'jurusan'])
            ->with('success', 'Jurusan berhasil dihapus.');
    }

    /* ===================== CURRICULUM ===================== */

    public function storeCurriculum(Request $request)
    {
        $request->validate([
            'subject_id'   => 'required|exists:subjects,id',
            'major_id'     => 'required|exists:majors,id',
            'grade'        => 'required|in:10,11,12',
            'report_label' => 'nullable|string|max:255',
        ]);

        SubjectCurriculum::create([
            'subject_id'   => $request->subject_id,
            'major_id'     => $request->major_id,
            'grade'        => $request->grade,
            'report_label' => $request->report_label,
        ]);

        // Update status is_active di subject
        Subject::find($request->subject_id)->update(['is_active' => true]);

        return redirect()->route('admin.subjects.index', ['tab' => 'kurikulum'])
            ->with('success', 'Cakupan kurikulum berhasil ditambahkan.');
    }

    public function destroyCurriculum(SubjectCurriculum $curriculum)
    {
        $subjectId = $curriculum->subject_id;
        $curriculum->delete();

        // Jika tidak ada kurikulum lagi, set is_active = false
        if (SubjectCurriculum::where('subject_id', $subjectId)->count() === 0) {
            Subject::find($subjectId)->update(['is_active' => false]);
        }

        return redirect()->route('admin.subjects.index', ['tab' => 'kurikulum'])
            ->with('success', 'Cakupan kurikulum berhasil dihapus.');
    }
}
