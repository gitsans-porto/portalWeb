<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'slug'             => 'e-raport',
                'name'             => 'E-Raport',
                'tagline'          => 'Sistem Penilaian Digital',
                'description'      => 'Sistem pelaporan hasil belajar siswa berbasis digital yang memudahkan guru dalam menginput nilai dan orang tua dalam memantau perkembangan akademik anak.',
                'long_description' => 'E-Raport adalah sistem penilaian dan pelaporan hasil belajar siswa secara elektronik yang dikembangkan oleh Kementerian Pendidikan. Sistem ini menggantikan raport konvensional berbasis kertas dengan platform digital yang lebih efisien, akurat, dan mudah diakses oleh seluruh pemangku kepentingan pendidikan.',
                'color'            => 'blue',
                'icon'             => 'document-chart-bar',
                'url'              => 'https://erapor.kemdikbud.go.id',
                'docs_url'         => '/layanan/e-raport/dokumentasi',
                'audiences'        => ['Guru', 'Staf Administrasi', 'Wali Kelas'],
                'features'         => [
                    ['icon' => 'chart-bar', 'title' => 'Input Nilai Digital', 'desc' => 'Guru dapat menginput nilai pengetahuan, keterampilan, dan sikap siswa secara langsung melalui platform tanpa perlu kertas.'],
                    ['icon' => 'document-text', 'title' => 'Cetak & Unduh Raport', 'desc' => 'Raport dapat dicetak atau diunduh dalam format PDF kapan saja setelah proses verifikasi selesai dilakukan.'],
                    ['icon' => 'eye', 'title' => 'Pantau Perkembangan Siswa', 'desc' => 'Wali kelas dan orang tua dapat memantau rekap nilai serta perkembangan akademik siswa secara berkala.'],
                    ['icon' => 'shield-check', 'title' => 'Verifikasi Berlapis', 'desc' => 'Proses verifikasi nilai dilakukan bertahap oleh wali kelas dan kepala sekolah untuk memastikan akurasi data.'],
                    ['icon' => 'users', 'title' => 'Manajemen Kelas & Mapel', 'desc' => 'Pengelolaan data kelas dan mata pelajaran yang diampu secara terpusat dan terstruktur.'],
                    ['icon' => 'cloud', 'title' => 'Data Tersimpan Aman', 'desc' => 'Seluruh data nilai tersimpan di server terpusat Kemdikbud sehingga aman dan dapat diakses kapan saja.'],
                ],
                'sop'              => [
                    ['title' => 'Login ke Sistem', 'desc' => 'Akses halaman E-Raport menggunakan akun yang telah didaftarkan oleh administrator sekolah. Gunakan username dan password yang diberikan.'],
                    ['title' => 'Pilih Kelas & Mata Pelajaran', 'desc' => 'Pada dashboard, pilih kelas yang diampu serta mata pelajaran yang akan diinput nilainya.'],
                    ['title' => 'Input Nilai Siswa', 'desc' => 'Masukkan nilai pengetahuan, keterampilan, dan sikap sesuai format kurikulum yang berlaku. Pastikan semua kolom terisi lengkap.'],
                    ['title' => 'Verifikasi & Cetak', 'desc' => 'Periksa kembali seluruh data yang telah diinput. Setelah diverifikasi oleh Wali Kelas dan Kepala Sekolah, raport siap dicetak atau diunduh.'],
                ],
            ],
            [
                'slug'             => 'lms',
                'name'             => 'LMS',
                'tagline'          => 'Learning Management System',
                'description'      => 'Platform e-learning untuk kegiatan belajar mengajar secara daring. Akses materi, tugas, dan kuis kapan saja dan di mana saja.',
                'long_description' => 'Learning Management System (LMS) SMKN 1 Limboto adalah platform pembelajaran daring yang memfasilitasi interaksi antara guru dan siswa secara virtual. Melalui LMS, guru dapat mengunggah materi pembelajaran, memberikan tugas, membuat kuis, dan memantau progres belajar siswa secara real-time.',
                'color'            => 'green',
                'icon'             => 'book',
                'url'              => 'https://lms.smkn1limboto.sch.id',
                'docs_url'         => '/layanan/lms/dokumentasi',
                'audiences'        => ['Siswa', 'Guru', 'Orang Tua'],
                'features'         => [
                    ['icon' => 'book-open', 'title' => 'Akses Materi Online', 'desc' => 'Siswa dapat mengakses modul, video, dan bahan ajar yang diunggah guru kapan saja dan di mana saja.'],
                    ['icon' => 'pencil', 'title' => 'Pengerjaan Tugas & Kuis', 'desc' => 'Kerjakan tugas dan kuis yang diberikan guru langsung melalui platform dengan tenggat waktu yang jelas.'],
                    ['icon' => 'chat', 'title' => 'Forum Diskusi Kelas', 'desc' => 'Berinteraksi dengan guru dan teman sekelas melalui forum diskusi yang tersedia di setiap mata pelajaran.'],
                    ['icon' => 'chart-bar', 'title' => 'Pantau Progres Belajar', 'desc' => 'Lihat rekap nilai tugas, kuis, dan feedback dari guru pada setiap mata pelajaran yang diikuti.'],
                    ['icon' => 'bell', 'title' => 'Notifikasi Tugas', 'desc' => 'Dapatkan notifikasi otomatis ketika ada tugas baru, tenggat waktu mendekat, atau nilai telah diumumkan.'],
                    ['icon' => 'download', 'title' => 'Unduh Materi', 'desc' => 'Unduh materi dalam berbagai format (PDF, PPT, video) untuk dipelajari secara offline sesuai kebutuhan.'],
                ],
                'sop'              => [
                    ['title' => 'Registrasi Akun', 'desc' => 'Siswa baru akan mendapatkan akun LMS dari administrator. Lakukan aktivasi akun melalui email yang terdaftar dan buat password baru.'],
                    ['title' => 'Akses Dashboard', 'desc' => 'Setelah login, Anda akan melihat dashboard dengan daftar kelas dan mata pelajaran yang diikuti.'],
                    ['title' => 'Ikuti Pembelajaran', 'desc' => 'Buka materi yang disediakan guru, unduh bahan ajar, dan kerjakan tugas atau kuis yang diberikan sesuai tenggat waktu.'],
                    ['title' => 'Pantau Progres', 'desc' => 'Lihat nilai dan feedback dari guru pada setiap tugas yang telah dikumpulkan melalui menu "Nilai" di dashboard.'],
                ],
            ],
            [
                'slug'             => 'dapodik',
                'name'             => 'Dapodik',
                'tagline'          => 'Data Pokok Pendidikan',
                'description'      => 'Sistem pendataan pendidikan nasional untuk mengelola data sekolah, guru, dan peserta didik secara terpusat dan akurat.',
                'long_description' => 'Dapodik (Data Pokok Pendidikan) adalah sistem pendataan skala nasional yang dikelola oleh Kementerian Pendidikan. Sistem ini menjadi sumber data utama untuk perencanaan, pelaksanaan, pelaporan, dan evaluasi program pendidikan nasional. Data yang dikelola meliputi data satuan pendidikan, peserta didik, pendidik dan tenaga kependidikan.',
                'color'            => 'amber',
                'icon'             => 'academic-cap',
                'url'              => 'https://dapo.kemdikbud.go.id',
                'docs_url'         => '/layanan/dapodik/dokumentasi',
                'audiences'        => ['Operator Sekolah', 'Staf Administrasi'],
                'features'         => [
                    ['icon' => 'database', 'title' => 'Pengelolaan Data Siswa', 'desc' => 'Input dan perbarui data peserta didik mulai dari penerimaan siswa baru, mutasi, hingga kelulusan secara sistematis.'],
                    ['icon' => 'users', 'title' => 'Data PTK', 'desc' => 'Kelola data pendidik dan tenaga kependidikan (PTK) secara lengkap termasuk riwayat pendidikan dan sertifikasi.'],
                    ['icon' => 'office-building', 'title' => 'Data Sarana & Prasarana', 'desc' => 'Catat dan perbarui data sarana prasarana sekolah seperti ruang kelas, laboratorium, dan fasilitas lainnya.'],
                    ['icon' => 'refresh', 'title' => 'Sinkronisasi Otomatis', 'desc' => 'Sinkronisasi data ke server pusat Kemdikbud secara berkala untuk memastikan data selalu valid dan up-to-date.'],
                    ['icon' => 'document-report', 'title' => 'Laporan & Rekap Data', 'desc' => 'Buat laporan rekap data sekolah dalam berbagai format sesuai kebutuhan administrasi dan pelaporan resmi.'],
                    ['icon' => 'shield-check', 'title' => 'Validasi Data Terpusat', 'desc' => 'Sistem validasi data yang ketat memastikan setiap data yang dimasukkan memenuhi standar nasional Kemdikbud.'],
                ],
                'sop'              => [
                    ['title' => 'Login Aplikasi Dapodik', 'desc' => 'Buka aplikasi Dapodik menggunakan akun operator sekolah. Pastikan sertifikat digital dan koneksi internet sudah siap.'],
                    ['title' => 'Update Data Sekolah', 'desc' => 'Perbarui data profil sekolah, termasuk sarana prasarana, kurikulum, dan data kelembagaan sesuai kondisi terkini.'],
                    ['title' => 'Kelola Data Siswa & Guru', 'desc' => 'Input data peserta didik baru, mutasi siswa, serta pembaruan data guru dan tenaga kependidikan.'],
                    ['title' => 'Sinkronisasi Data', 'desc' => 'Lakukan sinkronisasi data secara berkala ke server pusat untuk memastikan data selalu update dan valid.'],
                ],
            ],
            [
                'slug'             => 'pekael',
                'name'             => 'PeKaeL',
                'tagline'          => 'Praktek Kerja Lapangan',
                'description'      => 'Sistem monitoring dan pengelolaan kegiatan Praktek Kerja Lapangan (PKL) siswa di dunia usaha dan dunia industri.',
                'long_description' => 'PeKaeL adalah sistem internal SMKN 1 Limboto untuk mengelola seluruh proses Praktek Kerja Lapangan (PKL) siswa. Mulai dari pendaftaran, penempatan di perusahaan mitra, monitoring kegiatan harian, hingga penilaian akhir PKL. Sistem ini memudahkan koordinasi antara sekolah, siswa, dan perusahaan mitra.',
                'color'            => 'purple',
                'icon'             => 'briefcase',
                'url'              => 'https://pkl.smkn1limboto.sch.id',
                'docs_url'         => '/layanan/pekael/dokumentasi',
                'audiences'        => ['Siswa', 'Guru Pembimbing', 'Staf Administrasi'],
                'features'         => [
                    ['icon' => 'clipboard-list', 'title' => 'Pendaftaran PKL Online', 'desc' => 'Siswa dapat mendaftar PKL secara online, memilih bidang industri yang diminati, dan mengunggah dokumen persyaratan.'],
                    ['icon' => 'location-marker', 'title' => 'Penempatan di Mitra Industri', 'desc' => 'Sistem membantu sekolah menentukan penempatan siswa di perusahaan mitra yang sesuai dengan jurusan dan minat siswa.'],
                    ['icon' => 'pencil-alt', 'title' => 'Jurnal Harian Digital', 'desc' => 'Siswa mengisi jurnal kegiatan PKL harian secara digital sehingga dapat dipantau langsung oleh guru pembimbing.'],
                    ['icon' => 'eye', 'title' => 'Monitoring Real-Time', 'desc' => 'Guru pembimbing dapat memantau progress dan kehadiran siswa PKL secara real-time melalui dashboard monitoring.'],
                    ['icon' => 'star', 'title' => 'Penilaian Terintegrasi', 'desc' => 'Sistem penilaian yang melibatkan pembimbing industri dan guru pembimbing sekolah secara terintegrasi.'],
                    ['icon' => 'document-text', 'title' => 'Laporan Akhir PKL', 'desc' => 'Siswa menyusun dan mengunggah laporan akhir PKL melalui sistem untuk kemudian dievaluasi oleh guru pembimbing.'],
                ],
                'sop'              => [
                    ['title' => 'Pendaftaran PKL', 'desc' => 'Siswa mengisi formulir pendaftaran PKL secara online, memilih bidang industri yang diminati, dan mengunggah dokumen persyaratan.'],
                    ['title' => 'Penempatan & Pembekalan', 'desc' => 'Sekolah akan menempatkan siswa di perusahaan mitra sesuai jurusan. Siswa wajib mengikuti pembekalan sebelum memulai PKL.'],
                    ['title' => 'Pelaksanaan & Monitoring', 'desc' => 'Selama PKL, siswa wajib mengisi jurnal harian dan guru pembimbing melakukan monitoring secara berkala melalui sistem.'],
                    ['title' => 'Penilaian & Laporan', 'desc' => 'Setelah PKL selesai, siswa menyusun laporan akhir dan mendapatkan penilaian dari pembimbing industri dan guru pembimbing.'],
                ],
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
