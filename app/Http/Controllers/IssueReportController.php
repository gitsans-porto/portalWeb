<?php

namespace App\Http\Controllers;

use App\Models\IssueReport;
use Illuminate\Http\Request;

class IssueReportController extends Controller
{
    public function index()
    {
        $services = \App\Models\Service::all();
        return view('pengaduan.index', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'role' => 'required|string',
            'type' => 'required|string',
            'service_id' => 'nullable|exists:services,id',
            'category' => 'required|string',
            'description' => 'required|string',
        ]);

        // Generate Unique Tracking Code
        $trackingCode = 'TKT-' . strtoupper(bin2hex(random_bytes(3)));
        while (IssueReport::where('tracking_code', $trackingCode)->exists()) {
            $trackingCode = 'TKT-' . strtoupper(bin2hex(random_bytes(3)));
        }

        $validated['tracking_code'] = $trackingCode;
        $validated['status'] = 'pending';

        $report = IssueReport::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Laporan Anda telah berhasil dikirim.',
            'tracking_code' => $trackingCode
        ]);
    }

    public function track(Request $request)
    {
        $request->validate([
            'tracking_code' => 'required|string',
        ]);

        $report = IssueReport::with('service')->where('tracking_code', $request->tracking_code)->first();

        if (!$report) {
            return response()->json([
                'success' => false,
                'message' => 'Kode tiket tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'report' => [
                'full_name' => $report->full_name,
                'type' => $report->type,
                'category' => $report->category,
                'description' => $report->description,
                'status' => $report->status,
                'admin_feedback' => $report->admin_feedback,
                'created_at' => $report->created_at->format('d M Y H:i'),
                'handled_at' => $report->handled_at ? $report->handled_at->format('d M Y H:i') : null,
                'service_name' => $report->service ? $report->service->name : null,
            ]
        ]);
    }
}
