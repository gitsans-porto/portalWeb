<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalController extends Controller
{
    /**
     * Data layanan — bisa dipindah ke database di masa depan.
     */
    private function getLayananData(): array
    {
        return [
            'e-raport' => [
                'slug' => 'e-raport',
                'name' => 'E-Raport',
                'tagline' => 'Sistem Penilaian Digital',
                'description' => 'Sistem pelaporan hasil belajar siswa berbasis digital yang memudahkan guru dalam menginput nilai dan orang tua dalam memantau perkembangan akademik anak.',
                'long_description' => 'E-Raport adalah sistem penilaian dan pelaporan hasil belajar siswa secara elektronik yang dikembangkan oleh Kementerian Pendidikan. Sistem ini menggantikan raport konvensional berbasis kertas dengan platform digital yang lebih efisien, akurat, dan mudah diakses oleh seluruh pemangku kepentingan pendidikan.',
                'color' => 'blue',
                'icon' => 'document-chart-bar',
                'url' => 'https://erapor.kemdikbud.go.id',
                'audiences' => ['Guru', 'Staf Administrasi', 'Wali Kelas'],
                'sop' => [
                    ['title' => 'Login ke Sistem', 'desc' => 'Akses halaman E-Raport menggunakan akun yang telah didaftarkan oleh administrator sekolah. Gunakan username dan password yang diberikan.'],
                    ['title' => 'Pilih Kelas & Mata Pelajaran', 'desc' => 'Pada dashboard, pilih kelas yang diampu serta mata pelajaran yang akan diinput nilainya.'],
                    ['title' => 'Input Nilai Siswa', 'desc' => 'Masukkan nilai pengetahuan, keterampilan, dan sikap sesuai format kurikulum yang berlaku. Pastikan semua kolom terisi lengkap.'],
                    ['title' => 'Verifikasi & Cetak', 'desc' => 'Periksa kembali seluruh data yang telah diinput. Setelah diverifikasi oleh Wali Kelas dan Kepala Sekolah, raport siap dicetak atau diunduh.'],
                ],
            ],
            'lms' => [
                'slug' => 'lms',
                'name' => 'LMS',
                'tagline' => 'Learning Management System',
                'description' => 'Platform e-learning untuk kegiatan belajar mengajar secara daring. Akses materi, tugas, dan kuis kapan saja dan di mana saja.',
                'long_description' => 'Learning Management System (LMS) SMKN 1 Limboto adalah platform pembelajaran daring yang memfasilitasi interaksi antara guru dan siswa secara virtual. Melalui LMS, guru dapat mengunggah materi pembelajaran, memberikan tugas, membuat kuis, dan memantau progres belajar siswa secara real-time.',
                'color' => 'green',
                'icon' => 'book',
                'url' => 'https://lms.smkn1limboto.sch.id',
                'audiences' => ['Siswa', 'Guru', 'Orang Tua'],
                'sop' => [
                    ['title' => 'Registrasi Akun', 'desc' => 'Siswa baru akan mendapatkan akun LMS dari administrator. Lakukan aktivasi akun melalui email yang terdaftar dan buat password baru.'],
                    ['title' => 'Akses Dashboard', 'desc' => 'Setelah login, Anda akan melihat dashboard dengan daftar kelas dan mata pelajaran yang diikuti.'],
                    ['title' => 'Ikuti Pembelajaran', 'desc' => 'Buka materi yang disediakan guru, unduh bahan ajar, dan kerjakan tugas atau kuis yang diberikan sesuai tenggat waktu.'],
                    ['title' => 'Pantau Progres', 'desc' => 'Lihat nilai dan feedback dari guru pada setiap tugas yang telah dikumpulkan melalui menu "Nilai" di dashboard.'],
                ],
            ],
            'dapodik' => [
                'slug' => 'dapodik',
                'name' => 'Dapodik',
                'tagline' => 'Data Pokok Pendidikan',
                'description' => 'Sistem pendataan pendidikan nasional untuk mengelola data sekolah, guru, dan peserta didik secara terpusat dan akurat.',
                'long_description' => 'Dapodik (Data Pokok Pendidikan) adalah sistem pendataan skala nasional yang dikelola oleh Kementerian Pendidikan. Sistem ini menjadi sumber data utama untuk perencanaan, pelaksanaan, pelaporan, dan evaluasi program pendidikan nasional. Data yang dikelola meliputi data satuan pendidikan, peserta didik, pendidik dan tenaga kependidikan.',
                'color' => 'amber',
                'icon' => 'academic-cap',
                'url' => 'https://dapo.kemdikbud.go.id',
                'audiences' => ['Operator Sekolah', 'Staf Administrasi'],
                'sop' => [
                    ['title' => 'Login Aplikasi Dapodik', 'desc' => 'Buka aplikasi Dapodik menggunakan akun operator sekolah. Pastikan sertifikat digital dan koneksi internet sudah siap.'],
                    ['title' => 'Update Data Sekolah', 'desc' => 'Perbarui data profil sekolah, termasuk sarana prasarana, kurikulum, dan data kelembagaan sesuai kondisi terkini.'],
                    ['title' => 'Kelola Data Siswa & Guru', 'desc' => 'Input data peserta didik baru, mutasi siswa, serta pembaruan data guru dan tenaga kependidikan.'],
                    ['title' => 'Sinkronisasi Data', 'desc' => 'Lakukan sinkronisasi data secara berkala ke server pusat untuk memastikan data selalu update dan valid.'],
                ],
            ],
            'pekael' => [
                'slug' => 'pekael',
                'name' => 'PeKaeL',
                'tagline' => 'Praktek Kerja Lapangan',
                'description' => 'Sistem monitoring dan pengelolaan kegiatan Praktek Kerja Lapangan (PKL) siswa di dunia usaha dan dunia industri.',
                'long_description' => 'PeKaeL adalah sistem internal SMKN 1 Limboto untuk mengelola seluruh proses Praktek Kerja Lapangan (PKL) siswa. Mulai dari pendaftaran, penempatan di perusahaan mitra, monitoring kegiatan harian, hingga penilaian akhir PKL. Sistem ini memudahkan koordinasi antara sekolah, siswa, dan perusahaan mitra.',
                'color' => 'purple',
                'icon' => 'briefcase',
                'url' => 'https://pkl.smkn1limboto.sch.id',
                'audiences' => ['Siswa', 'Guru Pembimbing', 'Staf Administrasi'],
                'sop' => [
                    ['title' => 'Pendaftaran PKL', 'desc' => 'Siswa mengisi formulir pendaftaran PKL secara online, memilih bidang industri yang diminati, dan mengunggah dokumen persyaratan.'],
                    ['title' => 'Penempatan & Pembekalan', 'desc' => 'Sekolah akan menempatkan siswa di perusahaan mitra sesuai jurusan. Siswa wajib mengikuti pembekalan sebelum memulai PKL.'],
                    ['title' => 'Pelaksanaan & Monitoring', 'desc' => 'Selama PKL, siswa wajib mengisi jurnal harian dan guru pembimbing melakukan monitoring secara berkala melalui sistem.'],
                    ['title' => 'Penilaian & Laporan', 'desc' => 'Setelah PKL selesai, siswa menyusun laporan akhir dan mendapatkan penilaian dari pembimbing industri dan guru pembimbing.'],
                ],
            ],
        ];
    }

    /**
     * Halaman Beranda
     */
    public function index()
    {
        $layananList = collect($this->getLayananData())->map(fn($item) => [
            'slug' => $item['slug'],
            'name' => $item['name'],
            'tagline' => $item['tagline'],
            'description' => $item['description'],
            'color' => $item['color'],
            'icon' => $item['icon'],
        ])->values()->all();

        return view('beranda', compact('layananList'));
    }

    /**
     * Halaman Detail Layanan
     */
    public function layanan(string $slug)
    {
        $allLayanan = $this->getLayananData();

        if (!isset($allLayanan[$slug])) {
            abort(404);
        }

        $layanan = $allLayanan[$slug];

        return view('layanan', compact('layanan'));
    }
}
