<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title' => 'Siswa SMKN 1 Raih Juara 1 Lomba Kompetensi Siswa (LKS) Tingkat Provinsi',
                'category' => 'Prestasi',
                'content' => 'Prestasi membanggakan kembali diraih oleh perwakilan siswa SMKN 1 dalam ajang Lomba Kompetensi Siswa (LKS) Tingkat Provinsi tahun ini. Berkompetisi dengan puluhan SMK lainnya, perwakilan jurusan Teknik Komputer dan Jaringan (TKJ) berhasil menyabet Juara 1 pada bidang IT Network Systems Administration. Kepala Sekolah menyampaikan rasa syukur dan apresiasi yang setinggi-tingginya kepada siswa serta guru pembimbing yang telah berjuang keras selama masa persiapan. "Ini adalah bukti nyata bahwa lulusan SMKN 1 memiliki kompetensi yang unggul dan siap bersaing di dunia kerja profesional," ungkapnya. Dengan kemenangan ini, perwakilan sekolah akan melaju ke ajang LKS Tingkat Nasional yang akan diselenggarakan bulan depan.',
                'image' => null,
            ],
            [
                'title' => 'Pelepasan Ratusan Siswa Praktik Kerja Lapangan (PKL) Tahun Ajaran 2025/2026',
                'category' => 'Akademik',
                'content' => 'SMKN 1 secara resmi melepas lebih dari 300 siswa kelas XI untuk melaksanakan Praktik Kerja Lapangan (PKL) di berbagai Dunia Usaha dan Dunia Industri (DUDI) yang tersebar di wilayah kota maupun luar daerah. Acara pelepasan ini dihadiri oleh jajaran guru, komite sekolah, serta beberapa perwakilan dari perusahaan mitra. Program PKL ini akan berlangsung selama 3 hingga 6 bulan ke depan, tergantung dari kompetensi keahlian masing-masing. Siswa diharapkan mampu menerapkan ilmu yang telah dipelajari di sekolah ke dalam lingkungan kerja yang nyata, serta mengasah soft skill seperti kedisiplinan, kerja sama tim, dan etos kerja.',
                'image' => null,
            ],
            [
                'title' => 'Kunjungan Industri Jurusan Rekayasa Perangkat Lunak ke Perusahaan Startup Nasional',
                'category' => 'Kegiatan Sekolah',
                'content' => 'Dalam rangka memperluas wawasan siswa terhadap perkembangan teknologi industri terkini, jurusan Rekayasa Perangkat Lunak (RPL) SMKN 1 mengadakan Kunjungan Industri ke salah satu perusahaan startup tech terkemuka di ibu kota. Kegiatan ini diikuti oleh seluruh siswa kelas X beserta guru pendamping. Selama kunjungan, para siswa diberikan materi mengenai budaya kerja di industri kreatif, proses Software Development Life Cycle (SDLC) yang diterapkan perusahaan, hingga sesi tanya jawab langsung dengan para praktisi IT dan Software Engineer. Kegiatan ini diharapkan dapat memotivasi siswa untuk terus belajar dan berinovasi di bidang teknologi digital.',
                'image' => null,
            ],
            [
                'title' => 'Gelar Karya Produk Kreatif dan Kewirausahaan (PKK) SMKN 1 Sedot Perhatian Pengunjung',
                'category' => 'Event',
                'content' => 'Halaman utama SMKN 1 disulap menjadi area pameran yang meriah pada acara Gelar Karya Projek Penguatan Profil Pelajar Pancasila (P5) dan Produk Kreatif Kewirausahaan (PKK). Seluruh jurusan berpartisipasi memamerkan produk inovatif karya mereka, mulai dari aplikasi kasir berbasis web, perakitan perangkat Smart Home, hingga aneka produk food and beverage. Acara ini juga terbuka untuk umum dan mengundang perwakilan dari industri serta alumni. Banyak pengunjung yang antusias melihat langsung kreativitas para siswa, bahkan beberapa produk unggulan laris manis terjual dan mendapatkan tawaran kerja sama pengembangan. Ini membuktikan jiwa kewirausahaan siswa SMK sudah mulai terbentuk dengan baik.',
                'image' => null,
            ],
            [
                'title' => 'Pelaksanaan Uji Kompetensi Keahlian (UKK) Tahun Ini Berjalan Lancar dan Sukses',
                'category' => 'Akademik',
                'content' => 'Seluruh siswa kelas XII SMKN 1 telah menyelesaikan rangkaian Uji Kompetensi Keahlian (UKK) sebagai salah satu syarat kelulusan. UKK kali ini melibatkan penguji internal (guru produktif) dan penguji eksternal (asesor) dari mitra industri dan Lembaga Sertifikasi Profesi (LSP). Ujian berlangsung selama sepekan penuh dengan mengedepankan standar operasional prosedur (SOP) layaknya di dunia industri sesungguhnya. Hasil evaluasi dari para asesor eksternal menunjukkan bahwa secara keseluruhan, kompetensi para siswa sudah memenuhi standar industri yang diharapkan. Hal ini menjadi bekal yang sangat berharga bagi para lulusan yang akan segera memasuki dunia kerja.',
                'image' => null,
            ]
        ];

        $index = 1;
        foreach ($news as $item) {
            News::create([
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'content' => $item['content'],
                'image' => 'https://picsum.photos/seed/' . $index . '/800/600',
                'category' => $item['category'],
                'published_at' => Carbon::now()->subDays(rand(1, 30)),
            ]);
            $index++;
        }
    }
}
