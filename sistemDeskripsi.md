Judul: Website Portal Layanan Sistem Informasi SMKN 1 Limboto

1. Project Overview
Sistem ini berfungsi sebagai "Hub" atau pusat informasi dan layanan digital sebuah sekolah. Terdapat 4 layanan utama yang sudah berjalan di platform berbeda (3 pihak ketiga, 1 internal). Website ini tidak menggantikan aplikasi tersebut, melainkan menjadi jembatan terpusat agar pengguna (siswa, orang tua, guru) mudah menemukan, memahami panduan, dan mengakses layanan-layanan tersebut.

2. Core Flow & Navigation
Ketika user mengklik salah satu dari 4 layanan utama di halaman beranda, user TIDAK langsung diarahkan ke link eksternal. User harus diarahkan terlebih dahulu ke Halaman Detail Layanan. Halaman ini berisi deskripsi lengkap layanan, panduan tata cara penggunaan (SOP), dan tombol Call-to-Action (CTA) utama yang berisi link asli menuju website/aplikasi layanan tersebut.

3. User Interface (UI) & User Experience (UX) Guidelines
- Warna Utama: Hex Code #FE0002 (Merah).
- Desain Modern, clean, dan sangat user friendly.
- Wajib 100% responsive baik itu tampilan smartphone maupun laptop/desktop)
- Layout Beranda:
Top Section (Hero/Highlight): Langsung tampilkan 4 menu/kartu layanan utama (E-raport, LMS, Dapodik, PeKael). Pengunjung harus langsung melihat ini saat website pertama kali dimuat tanpa perlu scroll.
Middle/Bottom Section: Jika pengunjung melakukan scroll ke bawah, baru tampilkan Informasi Profil Sekolah, Berita, dan Kegiatan.

4. Interaksi yang bisa dilakukan oleh Pengguna
yang bisa dilakukan oleh masing-masing entitas di dalam sistem portal terpadu:
•	Siswa: Melihat katalog layanan akademik, membaca/mengunduh panduan penggunaan, dan mengklik tautan redirect menuju sistem asli (seperti LMS dan PeKaeL).
•	Guru dan Staf Administrasi: Melihat katalog layanan administrasi, membaca standar prosedur sistem, dan mengklik tombol redirect menuju sistem operasional asli (seperti E-Rapor atau Dapodik atau PeKaeL).
•	Orang Tua / Wali Murid: Melihat daftar informasi publik, membaca panduan akses sistem, dan mengklik tautan redirect menuju portal informasi akademik/nilai.

5. Non-Functional Requirements (Fokus Konfigurasi)
- Keamanan: Siapkan standar keamanan Laravel (CSRF protection, XSS prevention)
- Peforma: Struktur kode harus disiapkan untuk optimasi caching agar tetap stabil dan tidak down saat terjadi lonjakan pengunjung.



