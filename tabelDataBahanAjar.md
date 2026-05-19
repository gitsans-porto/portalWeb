Oke good! Selanjutnya pada tabel Materi Pembelajaran terdapat sebuah kolom status berisi dua informasi yakni "Dipublikasikan" dan "Draf". Kita akan mengadopsi konsep tabel seperti di youtube studio yang di mana ketika kursor berada di salah satu baris di tabel tersebut maka akan muncul setingan untuk mengatur Visibility-nya. Pada tabel di halaman materi pembelajaran, kolom status, ketika kursor kita arahkan ke baris salah satu data, maka sebuah anak panah akan muncul yang ketika diklik maka memunculkan dropdown untuk mengatur status "Draf" dan "Publikasi". Skemanya adalah, jika admin menambah materi/bahan ajar lalu menyetingnya sebagai draf, maka di setingan ini akan muncul "Draf" yang sementara dipilih, dan "Publikasi" untuk mem-publikasikan bahan ajar. Tapi Ketika di awal sudah berstatus publik, atau saat berstatus draft dan dibuat publik melalui pengaturan ini atau melalui tombol edit, maka pengaturan ini hanya menampilkan "Private" dan "Publikasi". Jangan lupa di kolom aksi tambahkan "Edit" agar bisa mengedit bahan ajar tersebut. 

Kemudian tambahkan icon untuk untuk status "Dipublikasikan" menggunakan icon dari fonts.google.com berikut:
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=public" />

<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
</style>

atau anda bisa mencarinya di fonts.google.com dengan kata kunci "public".

Untuk status "draf" gunakan icon "draft" dari fonts.google.com berikut:
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=draft" />

<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
</style>

atau anda bisa mencarinya di fonts.google.com dengan kata kunci "draft".

Dan untuk ikon private gunakan icon "lock" dari fonts.google.com berikut:
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=lock" />

<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
</style>

atau anda bisa mencarinya di fonts.google.com dengan kata kunci "lock".

Terakhir jangan gunakan backround text pada isi di kolom tipe dan status. Untuk isi yang ada di dalam kolom Tipe, gunakan Teks warna hitam non-bold. Kmeudian untuk di kolom Status, jika statusnya "Dipublikasikan" gunakan teks hitam bold, selain status itu gunakan warna abu-abu muda dan non-bold.
