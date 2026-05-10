Pada halaman Admin Saya memiliki fitur "Kelola Layanan" di mana admin dapat mengelola langkah-langkah prosedur (tata cara penggunaan) dari sebuah layanan. Saat ini, input deskripsi setiap langkah masih menggunakan textarea biasa.

Saya ingin kamu melakukan dua hal berikut:

---

## TASK 1: Integrasi TinyMCE sebagai Rich Text Editor

Ganti semua textarea deskripsi langkah prosedur yang ada di halaman edit layanan (admin) dengan TinyMCE Rich Text Editor.

Ketentuan integrasi TinyMCE:
- Gunakan TinyMCE versi terbaru via CDN (https://cdn.jsdelivr.net/npm/tinymce@7/tinymce.min.js)
- Inisialisasi TinyMCE pada semua textarea yang memiliki class atau selector yang relevan dengan input deskripsi langkah
- Toolbar TinyMCE minimal mencakup: bold, italic, underline, bullist, numlist, image, link, undo, redo
- Aktifkan plugin: lists, link, image, media, table, code
- Pastikan konten TinyMCE ter-submit dengan benar saat form dikirim (sync ke textarea sebelum submit)
- Pastikan TinyMCE juga terinisialisasi pada langkah baru yang ditambahkan secara dinamis (jika ada fitur tambah langkah via JavaScript/AJAX)
- Simpan output TinyMCE sebagai HTML ke database (kolom tipe TEXT atau LONGTEXT)
- Tampilkan konten HTML tersebut dengan aman menggunakan {!! $variable !!} di Blade, bukan {{ }}

---

## TASK 2: Fitur Unduh Panduan sebagai PDF

Tambahkan fitur "Unduh Panduan (PDF)" pada halaman publik detail layanan. PDF di-generate dari konten langkah-langkah prosedur yang sudah tersimpan di database.

Ketentuan generate PDF:
- Gunakan package barryvdh/laravel-dompdf
- Install via: composer require barryvdh/laravel-dompdf
- Buat route baru: GET /layanan/{slug}/download-panduan
- Buat controller method downloadPanduan(string $slug) yang:
  1. Mengambil data layanan beserta langkah-langkah prosedurnya dari database
  2. Me-render view Blade khusus PDF (contoh: layanan.panduan-pdf)
  3. Mengembalikan response download PDF dengan nama file: panduan-{slug}.pdf
- Buat Blade view khusus PDF (resources/views/layanan/panduan-pdf.blade.php) dengan struktur:
  * Header: Nama Layanan sebagai judul
  * Deskripsi singkat layanan (jika ada)
  * Daftar langkah-langkah prosedur bernomor, lengkap dengan judul dan deskripsi HTML dari TinyMCE
  * Styling inline CSS sederhana agar tampil baik di PDF (font, spacing, warna heading)
- Tambahkan tombol "Unduh Panduan (PDF)" di halaman publik detail layanan, yang mengarah ke route di atas

---

## Hal yang perlu diperhatikan:

- Jangan ubah struktur database yang sudah ada, kecuali jika kolom deskripsi langkah belum bertipe TEXT/LONGTEXT — jika perlu, buatkan migration untuk mengubahnya
- Sesuaikan nama model, controller, route, dan view dengan struktur yang sudah ada di project ini
- Jika ada lebih dari satu tempat textarea langkah (misal halaman create dan edit), terapkan TinyMCE di keduanya
- Pastikan tidak ada konflik dengan asset atau script yang sudah ada
- Pastikan untuk mengedepankan keamanan dan jangan membuat celah keamanan baru pada fitur maupun pada website ini
- Pastikan juga tidak ada eror pada website ini saat fitur baru diimplementasikan, jika ada eror, perbaiki eror tersebut terlebih dahulu sebelum melanjutkan

kerjakan kedua task di atas secara berurutan.