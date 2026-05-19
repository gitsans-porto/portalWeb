Selanjutnya kita akan mengurus bagian dalam dari setiap card di msing jurusan untuk menampilkan bahan ajar yang sudah di upload oleh admin pada halaman admin. Flownya adalah:

1. Setekah user klik tombol "Lihat Bahan Ajar" yang ada pada setiap card jurusan, maka user akan diarahkan ke halaman bahan ajar untuk jurusan tersebut
2. Ketika user masuk ke halaman ini, user melihat semua daftar bahan ajar yang ada pada jurusan tersebut yang sudah diupload oleh admin (tidak peduli dari kelas berapa, jenis mapel apa, dan mapel apa. Semua akan diatur pada filter nantinya). Teks "Pilih Jurusan" dan "Silahkan pilih jurusan untuk melihat bahan ajar yang tersedia" akan hilang dan digantikan dengan beberapa filter berikut:
    - filter "Kelas" (placeholder: Pilih Kelas): Terdiri dari beberapa pilihan yakni "Kelas 10", "Kelas 11", "Kelas 12".
    - filter "Jenis Mapel" (placeholder: Semua Jenis Mapel): Terdiri dari beberapa pilihan yakni "Semua Jenis Mapel" (yang aktif pertama kali), "Umum", "Kejuruan", dan "Pilihan".
    - filter "Mapel" (placeholder: Pilih Mapel): Pada filter mapel sifatnya kondisional. Mapel yang akan muncul disini sesuai dengan 2 pilihan sebelumnya dan termasuk di kelas dan jenis mapel tersebut. Contohnya: Jika user memilih "Kelas 10" dan "Umum" pada 2 filter sebelumnya, maka pada filter mapel akan muncul semua mapel kelas 10 yang jenisnya umum. Kemudian jika user memilih misal "Kelas 10", "Umum", dan "Matematika", kemudian dia mengganti filter kelas maupun filter Jenis mapel, sementara filter mapel masih "Matematika", maka filter mapel akan reset dan dia harus memilih mapel lagi sesuai dengan filter kelas dan jenis mapel yang baru.
    - Terakhir adalah tambahkan search bar untuk memudahkan user mencari bahan ajar yang dicari.
3. Semua filter di atas memengaruhi secara real-time bahan ajar yang ditampilkan.

Selanjutnya untuk design card bahan ajarnya bisa anda lihat gambar yang saya lampirkan. Design tersebut terdapat beberapa icon yang saya ambil dari https://fonts.google.com/ dengan material symbols outline, berikut kata kunci antara lain:
    - preview. Untuk icon pada tombol "Lihat pdf" di samping tombol "Unduh PDF". Jangn buat tombol untuk icon ini, cukup gunakan icon tersebut sebagai tombol untuk lihat pdf.
    - file_save. Untuk icon yang ditaruh di kotak merah paling kiri di card untuk menandakan bahan ajar tipe pdf.
    - download. Untuk icon pada tombol download. 
    - drive_export. Untuk icon yang ditaruh di kotak merah paling kiri di card untuk menandakan bahan ajar tipe google drive.
    - arrow_outward. Untuk icon pada tombol "Lihat Drive".
    - play_arrow. untuk icon pada tombol "Tonton Video" pada bahan ajar tipe video youtube.
    - video_template. untuk icon yang ditaruh di kotak merah paling kiri di card untuk menandakan bahan ajar tipe video youtube.

Silahkan kerjakan semua perubahan di atas dan jangan meninggalkan error sedikitpun!
    
    
    