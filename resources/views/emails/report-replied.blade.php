@component('mail::message')
# Admin Telah Menanggapi Laporan Anda

Halo, **{{ $report->full_name ?: 'Anonymous' }}**!

Admin telah memberikan tanggapan atas laporan Anda mengenai **{{ $report->category }}**.

---

## Tanggapan Admin

{{ $report->admin_feedback }}

---

**Status Laporan:**
@if($report->status === 'resolved')
✅ Selesai
@elseif($report->status === 'in_progress')
🔵 Sedang Diproses
@else
🟡 Tertunda
@endif

**Ditanggapi pada:** {{ $report->handled_at ? $report->handled_at->format('d M Y, H:i') . ' WIB' : '-' }}

---

Jika jawaban ini belum memuaskan atau ada hal lain yang ingin disampaikan, Anda dapat membuat laporan baru melalui portal kami.

Terima kasih,

**Tim Portal SMKN 1 Limboto**
@endcomponent
