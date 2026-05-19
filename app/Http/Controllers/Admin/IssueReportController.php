<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ReportRepliedMail;
use App\Mail\ReportStatusChangedMail;
use App\Models\IssueReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IssueReportController extends Controller
{
    public function index()
    {
        $reports = IssueReport::with('service')->latest()->get();
        return view('admin.reports.index', compact('reports'));
    }

    public function show(IssueReport $report)
    {
        return view('admin.reports.show', compact('report'));
    }

    /**
     * Update status saja (tanpa feedback) — kirim email notifikasi
     */
    public function updateStatus(Request $request, IssueReport $report)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,in_progress,resolved',
        ]);

        $report->update($validated);

        if ($report->email) {
            try {
                Mail::to($report->email)->send(new ReportStatusChangedMail($report));
            } catch (\Exception $e) {
                \Log::warning('Gagal kirim email status: ' . $e->getMessage());
            }
        }

        $note = $report->email ? ' Email notifikasi terkirim.' : '';
        return redirect()->back()->with('success', 'Status berhasil diperbarui.' . $note);
    }

    /**
     * Update status + feedback sekaligus — kirim email tanggapan ke pelapor
     */
    public function updateFeedback(Request $request, IssueReport $report)
    {
        $validated = $request->validate([
            'status'         => 'required|string|in:pending,in_progress,resolved',
            'admin_feedback' => 'nullable|string',
        ]);

        $updateData = [
            'status'     => $validated['status'],
            'handled_at' => now(),
        ];

        if (!empty($validated['admin_feedback'])) {
            $updateData['admin_feedback'] = $validated['admin_feedback'];
        }

        $report->update($updateData);
        $report->refresh();

        // Kirim email yang sesuai ke pelapor
        if ($report->email) {
            try {
                // Jika ada tanggapan baru → kirim email balasan
                // Jika hanya ubah status → kirim email perubahan status
                $mail = !empty($validated['admin_feedback'])
                    ? new ReportRepliedMail($report)
                    : new ReportStatusChangedMail($report);

                Mail::to($report->email)->send($mail);
            } catch (\Exception $e) {
                \Log::warning('Gagal kirim email: ' . $e->getMessage());
            }
        }

        $hasEmail = $report->email;
        $hasFeedback = !empty($validated['admin_feedback']);
        $emailNote = $hasEmail
            ? ($hasFeedback ? ' Email tanggapan terkirim ke pelapor.' : ' Email notifikasi status terkirim.')
            : ' (Pelapor tidak menyertakan email.)';

        return redirect()->back()->with('success', 'Laporan berhasil diperbarui.' . $emailNote);
    }
}
