<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IssueReport;
use Illuminate\Http\Request;

class IssueReportController extends Controller
{
    public function index()
    {
        $reports = IssueReport::with('service')->latest()->paginate(10);
        return view('admin.reports.index', compact('reports'));
    }

    public function show(IssueReport $report)
    {
        return view('admin.reports.show', compact('report'));
    }

    public function updateStatus(Request $request, IssueReport $report)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,in_progress,resolved',
        ]);

        $report->update($validated);

        return redirect()->route('admin.reports.index')->with('success', 'Status laporan berhasil diperbarui.');
    }
}
