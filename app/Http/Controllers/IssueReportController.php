<?php

namespace App\Http\Controllers;

use App\Mail\ReportConfirmationMail;
use App\Models\IssueReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'full_name'   => 'required|string|max:255',
            'email'       => 'nullable|email|max:255',   // opsional — untuk anonim
            'role'        => 'required|string',
            'type'        => 'required|string',
            'service_id'  => 'nullable|exists:services,id',
            'category'    => 'required|string',
            'description' => 'required|string',
        ]);

        // Generate Unique Tracking Code
        $trackingCode = 'TKT-' . strtoupper(bin2hex(random_bytes(3)));
        while (IssueReport::where('tracking_code', $trackingCode)->exists()) {
            $trackingCode = 'TKT-' . strtoupper(bin2hex(random_bytes(3)));
        }

        $validated['tracking_code'] = $trackingCode;
        $validated['status']        = 'pending';

        $report = IssueReport::create($validated);

        // Kirim email konfirmasi hanya jika email diisi
        if ($report->email) {
            try {
                Mail::to($report->email)->send(new ReportConfirmationMail($report));
            } catch (\Exception $e) {
                \Log::warning('Gagal kirim email konfirmasi: ' . $e->getMessage());
            }
        }

        return response()->json([
            'success'    => true,
            'has_email'  => (bool) $report->email,
            'message'    => $report->email
                ? 'Laporan berhasil dikirim. Email konfirmasi telah dikirim ke inbox Anda.'
                : 'Laporan berhasil dikirim secara anonim.',
        ]);
    }

    public function track(Request $request)
    {
        $request->validate(['tracking_code' => 'required|string']);

        $report = IssueReport::with('service')
            ->where('tracking_code', $request->tracking_code)
            ->first();

        if (!$report) {
            return response()->json(['success' => false, 'message' => 'Kode tiket tidak ditemukan.'], 404);
        }

        return response()->json([
            'success' => true,
            'report'  => [
                'full_name'      => $report->full_name,
                'type'           => $report->type,
                'category'       => $report->category,
                'description'    => $report->description,
                'status'         => $report->status,
                'admin_feedback' => $report->admin_feedback,
                'created_at'     => $report->created_at->format('d M Y H:i'),
                'handled_at'     => $report->handled_at ? $report->handled_at->format('d M Y H:i') : null,
                'service_name'   => $report->service ? $report->service->name : null,
            ]
        ]);
    }

    public function publicStatus(string $code)
    {
        $report = IssueReport::with('service')
            ->where('tracking_code', $code)
            ->firstOrFail();

        return view('pengaduan.status', compact('report'));
    }
}
