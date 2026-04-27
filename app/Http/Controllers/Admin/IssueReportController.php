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

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui.');
    }

    public function updateFeedback(Request $request, IssueReport $report)
    {
        $validated = $request->validate([
            'admin_feedback' => 'required|string',
            'status' => 'nullable|string|in:pending,in_progress,resolved',
        ]);

        $updateData = [
            'admin_feedback' => $validated['admin_feedback'],
            'handled_at' => now(),
        ];

        if (isset($validated['status'])) {
            $updateData['status'] = $validated['status'];
        } else {
            $updateData['status'] = 'resolved'; // Default to resolved when feedback is given
        }

        $report->update($updateData);

        return redirect()->back()->with('success', 'Feedback berhasil dikirim.');
    }
}
