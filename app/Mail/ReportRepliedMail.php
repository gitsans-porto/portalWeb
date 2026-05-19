<?php

namespace App\Mail;

use App\Models\IssueReport;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReportRepliedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public IssueReport $report) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '💬 Admin Telah Menanggapi Laporan Anda',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.report-replied',
            with: [
                'report' => $this->report,
                'statusUrl' => route('pengaduan.status', $this->report->tracking_code),
            ]
        );
    }
}
