(sebelum anda melakukan perbaikan ini, pastikan anda sudang menganalisis perubahan yang terjadi pada folder ini yakni penambahan bahan ajar):

A. Halaman Admin
1. Pada Kelola bahan ajar, terdapat dropdown berisi mata pelajaran dan kelola materi. Ganti nama "Mata Pelajaran" menjadi "Data Master". Setelah itu untuk isi dari "Data Master" dan "Kelola Materi" perhatikan penjelasan di bawah ini:
- Data Master: 
Saat ini halaman tersebut masih berjudul "Mata Pelajaran" dengan deskripsi "Kelola daftar mata pelajaran untuk bahan ajar". Ganti dengan "Data Master" kemudian "Kelola jurusan, mata pelajaran, dan kurikulum".
Kemudian Tambahkan 3 tab navigasi di bawahnya yakni "Jurusan", "Mata Pelajaran", dan "Kurikulum Mapel". 
a. Tab "Jurusan": Saat admin memilih tab ini, maka tabelnya menampilkan data jurusan. 
b. Tab "Mata Pelajaran": Saat admin memilih tab ini, maka tabelnya menampilkan data mata pelajaran.
c. Tab "Kurikulum Mapel": Saat admin memilih tab ini, maka tabelnya menampilkan data kurikulum mapel.

Tombol "Tambah Pelajaran" yang ada di kanan atas saat ini, ganti namanya menjadi "Tambah Data". 

Untuk kolom yang menampilkan data masing masing tab tersebut seperti berikut:
a. Tab Jurusan: Kolomnya ada "Nama Jurusan", "Kode", "Mapel Aktif", dan tombol aksi (edit, hapus).
b. Tab Mata Pelajaran: Kolomnya ada "Nama Mapel", "Kode Mapel", "Jenis Mapel", "Status (aktif/belum aktif) dan tombol aksi (edit, hapus). 
c. Tab Cakupan Kurikulum Mapel: Kolomnya ada "nama mapel", "Jurusan", "Kelas", "label raport" (jika tidak ada beri tanda "-"), "Jenis Mapel".

Untuk mekanisme pengisian datanya sebagai berikut:
a. Tab Jurusan: Saat admin mengklik tombol "Tambah Data", maka muncul pop up form pengisian untuk menambahkan data jurusan. Form tersebut berisi 2 kolom yakni "Nama Jurusan" (tambahkan placeholder "contoh: Teknik Komputer dan Jaringan") dan "Kode Jurusan" (tambahkan placeholder "contoh: TKJ").
b. Tab Mata Pelajaran: Untuk menambah data ini, kita tidak akan membuat form pengisian yang panjang sekaligus. alurnya setelah admin klik tombol "Tambah Data" dan muncul pop up form pengisian adalah:
    1. Munculkan form pop up untuk daftarkan mapelnya dulu berupa kolom nama (isi placeholder "contoh: Matematika"), kode mapel bersifat opsional (isi placeholder "contoh: MTK"), jenis mapel (untuk jenis mapel bikin dropdown berisi Umum, Kejuruan, Pilihan). Kemudian tambahkan tombol "Lanjut ke Cakupan Kurikulum" untuk lanjut ke tahap berikutnya.
    2. Pada form ini admin akan menautkan mapel tersebut ke Jurusan, Tingkat Kelas, dan Label Raport. Satu mapel bisa ditautkan ke banyak kombinasi jurusan dan kelas tanpa harus membuat entri mapel baru berkali-kali. Untuk detail designya bisa anda lihat pada gambar yang saya upload di percakapan (nama file "formCakupanKurikulum.png"). Tambahkan tombol "Lanjut ke Konfirmasi" untuk lanjut ke tahap berikutnya.
    3. Form ini hanya berisi konfirmasi dari form pengisian sebelumnya untuk memastikan data sudah benar dan jika saat di tahap sebelumnya user belum menautkan mapel, maka akan ada teks peringatan di form ini bertuliskan "Belum ada cakupan, mapel akan disimpan tapi belum aktif di kurikulum mana pun. Silahkan isi terlebih dahulu di tahap sebelumnya atau Bisa ditambahkan nanti.". Kemudian pada bagian bawah form, terdapat tombol "Simpan".
c. Tab Cakupan Kurikulum Mapel: Tabel disini hanya bersifat read only, jadi Saat admin memilih tab ini, maka tabelnya menampilkan data kurikulum mapel. Hanya saja sebelum data ditampilkan, admin wajib memilih jurusan kemudian pilih kelas. Jadi nanti akan disediakan sebuah fiter "Pilih Jurusan" dan "Pilih Kelas". Untuk pilih jurusan sediakan combobox atau komponen yang merupakan gabungan antara elemen input teks biasa (di mana pengguna bisa mengetik) dan elemen dropdown (di mana pengguna bisa memilih opsi yang sudah ada) (isi placeholder "Pilih Jurusan"). Sementara "Pilih Kelas" berupa komponen dropdown berisi  "Kelas 10", "Kelas 11", "Kelas 12" (isi placeholder "Pilih Kelas"). "Pilih Kelas" hanya akan aktif atau bisa diinteraksi ketika sudah ada data jurusan yang dipilih (jadi akan berwarna abu abu muda dan tidak bisa di klik). Data pada tab ini akan muncul ketik admin sudah pilih jurusan. 

- Kelola Materi:
Pada bagian ini kita tidak akan membuat banyak perbaikan. Kita hanya akan menambah dan menyesuaikan beberapa bagian saja. Berikut penjelasannya: 
    1. Tambahkan sebuah icon filter untuk tabel pada halaman ini yang ketika diklik akan memunculkan dropdown berisi beberapa filter yakni:
        - "Pilih Jurusan" (Berisi nama jurusan yang sudah ada di tab "Data Master" Jurusan dan khusus filter ini gunakan combobox atau komponen seperti pada "pilih jurusan" di "kelola cakupan kurikulum mapel"), 
        - "Pilih Tingkat" (Berisi "Kelas 10", "Kelas 11", "Kelas 12"),
        - "Pilih Jenis Mapel" (Berisi "Umum", "Kejuruan", "Pilihan"),
        - "Pilih Mapel" (Berisi nama mapel yang sudah ada di tab "Data Master" Mata Pelajaran dan khusus filter ini gunakan combobox atau komponen seperti pada "pilih jurusan" kemudian opsi yang akan tampil disini tergantung dengan pilihan "Pilih Jurusan", "Pilih Tingkat", dan "Pilih Jenis Mapel", jika mapel tidak tertaut dengan pilihan filter tersebut maka opsi tidak akan muncul di filter ini. Kolom ini tidak bisa di interaksi jika belum memilih ketiga pilihan tersebut),
        - "Pilih Tipe" (Berisi "PDF", "PPT", "Link")
        - "Pilih Status" (Berisi "Dipublikasikan" dan "Draf"),
    Terakhir tinggal tambahkan kolom search untuk mencari judul bahan ajar. Semua filter di atas bersifat realtime ketika admin memilih maka akan langsung menerapkan filter tersebut ke tabel.
    2. Kemudian isi dari form unggah materi berikut beberapa penyesuaiannya:
    - di kolom "Mata Pelajaran" ubah tipe dropdownnya menjadi combobox. Kemudian untuk saat ini pilihan opsi yang muncul hanya tertulis dengan format "[Nama Mapel] ([Jenis Mapel])". Ubah formatnya menjadi "[Nama Mapel] — [Jurusan] [Kelas] ([jenis mapel])". Contohnya "Matematika — TKJ Kelas 10 (Umum)". Karena di opsinya sudah menampilkan nama jurusan dan juga kelasnya, maka hilangkan / hapus kolom "Untuk Kelas" dan "Jurusan". Agar admin tidak sulit mencari jurusan dan kelas yang ada di opsi tersebut, admin tetap bisa terus mengetik Nama Mapel dan jurusan serta kelasnya di kolom tersebut sampai opsi rekomendasi menampilkan apa yang admin cari.
    3. Setelah itu tambahkan kolom Deskripsi Singkat bersifat Opsional dan isi placeholder dengan "Jelaskan sedikit mengenai materi ini".
    4. Untuk unggah file kita akan punya perubahan disini:
        - Beri judul "Tipe Materi" dan di bawahnya sediakan 2 tombol yakni "Unggah File" dan "Tempel Link". JIka user memilih "Unggah File" maka akan menampilkan form dropezone untuk mengunggah file. Sementara jika user memilih "Tempel Link" maka akan menampilkan form inputan untuk menempelkan link url. Untuk "Unggah File" tambahkan teks place holder "Drop file di sini atau klik untuk upload" di area dropezone. Untuk "Tempel Link" tambahkan place holder "https://docs.google.com/" dan teks dibawah kolom inputan "Bisa berupa Google Drive, YouTube, atau tautan lainnya.".
    5. Terakhir untuk tombol selain "Batal" dan "Unggah Materi", tambahkan tombol "Simpan Sebagai Draf". Ubah teks pada tombol "Unggah Materi" menjadi "Publikasikan Sekarang". 

    Silahkan anda kerjakan perubahan di atas sebaik mungkin tanpa meninggalkan detail yang sudah saya jelaskan serta error yang mungkin terjadi pada saat pengerjaan!.