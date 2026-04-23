<?php

namespace App\Http\Controllers;

use App\Models\IssueReport;
use Illuminate\Http\Request;

class IssueReportController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'role' => 'required|string',
            'class_nip' => 'nullable|string|max:255',
            'service_id' => 'nullable|exists:services,id',
            'category' => 'required|string',
            'description' => 'required|string',
        ]);

        IssueReport::create($validated);

        return response()->json([
            'message' => 'Laporan Anda telah berhasil dikirim. Terima kasih!',
        ]);
    }
}
