@component('mail::message')
# Laporan Anda Telah Diterima

Halo, **{{ $report->full_name ?: 'Anonymous' }}**!

Terima kasih telah menyampaikan laporan kepada kami.
Laporan Anda dengan kategori **{{ $report->type }} — {{ $report->category }}** telah berhasil kami terima.

---

## Informasi Laporan

| | |
|---|---|
| **Jenis** | {{ $report->type }} |
| **Topik** | {{ $report->category }} |
| **Tanggal** | {{ $report->created_at->format('d M Y, H:i') }} WIB |

**Isi Laporan:**
> {{ $report->description }}

---

Laporan Anda akan segera ditindaklanjuti oleh tim kami. Jika ada pembaruan status atau tanggapan dari admin, Anda akan mendapatkan notifikasi melalui email ini.

Terima kasih atas kepercayaan Anda,

**Tim Portal SMKN 1 Limboto**
@endcomponent
