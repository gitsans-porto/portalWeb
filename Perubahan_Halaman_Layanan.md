# Tugas Frontend: Pembaruan UI & Fungsionalitas Halaman E-Raport

Tolong perbarui kode pada halaman E-Raport dengan detail pengerjaan sebagai berikut:

## 1. Perombakan Tombol (Hero Section)
Hapus elemen *shape/badge* statis ("Guru", "Staf Administrasi", "Wali Kelas") yang berada di bawah tombol utama "Akses E-Raport". 
Ganti dengan dua buah tombol interaktif: **"Panduan"** dan **"FAQ"**.

**Aturan Styling CSS/Tailwind untuk kedua tombol tersebut:**
* **State Default:** Latar belakang (*background*) harus transparan, teks berwarna putih, dan berikan garis tepi (*border*) berwarna putih tipis agar bentuk tombol tetap terlihat jelas.
* **State Hover:** Saat kursor diarahkan ke tombol, ubah *background* menjadi putih solid. Warna teks harus otomatis berubah menjadi gelap agar tetap terbaca.
* **Animasi:** Tambahkan efek *transition* yang halus untuk perubahan warna *background* dan teks tersebut.

## 2. Fungsionalitas Switch Konten (Tab Logic)
Kedua tombol tersebut berfungsi sebagai pengalih konten (*content switcher*) untuk area di bawah Hero Section. Tolong implementasikan logika JavaScript sederhana untuk mengatur ini:

* **Persiapan Kontainer:**
    * Bungkus bagian "Tata Cara Penggunaan" yang sudah ada ke dalam sebuah `<div>` dengan ID spesifik, misalnya `<div id="content-panduan">`.
    * Buat sebuah `<div>` baru persis di bawahnya dengan ID `<div id="content-faq">`. Isi div ini dengan struktur *dummy* FAQ sederhana (judul dan beberapa pertanyaan). Set div FAQ ini agar tersembunyi secara default (`display: none` atau *class* `hidden`).
    * Untuk design susunan FAQ-nya saya ingin seperti yang ada pada screenshot yang saya berikan. Ketika di klik maka akan menampilkan jawaban dari FAQ tersebut. Dan ketika user klik FAQ pertanyaan lainnya sementara FAQ Pertanyaan lain sementara terbuka maka jawaban FAQ yang lain akan tertutup.
   
* **Logika JavaScript:**
    * Buat fungsi klik pada tombol "FAQ": Saat diklik, sembunyikan `content-panduan` dan tampilkan `content-faq`.
    * Buat fungsi klik pada tombol "Panduan": Saat diklik, sembunyikan `content-faq` dan tampilkan kembali `content-panduan`.
    *  Berikan *class* penanda (misal: `active`) pada tombol yang sedang dipilih agar pengguna tahu mereka sedang melihat konten yang mana.