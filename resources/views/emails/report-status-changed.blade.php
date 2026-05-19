@component('mail::message')
# Pembaruan Status Laporan Anda

Halo, **{{ $report->full_name ?: 'Anonymous' }}**!

Status laporan Anda telah diperbarui oleh admin.

---

## Status Terbaru

@if($report->status === 'in_progress')
**🔵 Sedang Diproses** — Laporan Anda sedang ditangani oleh tim kami.
@elseif($report->status === 'resolved')
**✅ Selesai** — Laporan Anda telah diselesaikan.
@else
**🟡 Tertunda** — Laporan Anda sedang dalam antrean.
@endif

---

**Topik Laporan:** {{ $report->category }}

@if($report->admin_feedback)
**Catatan dari Admin:**

{{ $report->admin_feedback }}
@endif

---

Jika ada pertanyaan lebih lanjut, Anda dapat mengirimkan laporan baru melalui portal kami.

Terima kasih,

**Tim Portal SMKN 1 Limboto**
@endcomponent
