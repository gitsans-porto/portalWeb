<?php

namespace App\Mail;

use App\Models\IssueReport;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReportStatusChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public IssueReport $report) {}

    public function envelope(): Envelope
    {
        $statusLabel = match($this->report->status) {
            'in_progress' => '🔵 Laporan Anda Sedang Diproses',
            'resolved'    => '✅ Laporan Anda Telah Diselesaikan',
            default       => '🔔 Status Laporan Anda Diperbarui',
        };

        return new Envelope(
            subject: $statusLabel . ' — ' . $this->report->tracking_code,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.report-status-changed',
            with: [
                'report'    => $this->report,
                'statusUrl' => route('pengaduan.status', $this->report->tracking_code),
            ]
        );
    }
}
