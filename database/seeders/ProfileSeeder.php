<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tentang Sekolah
        Profile::updateOrCreate(
            ['section' => 'tentang_sekolah'],
            [
                'title' => 'Tentang SMKN 1 Limboto',
                'short_description' => 'Mengenal sejarah, perjalanan, dan dedikasi SMKN 1 Limboto dalam mencetak generasi unggul yang siap kerja.',
                'content' => 'SMKN 1 Limboto merupakan salah satu lembaga pendidikan kejuruan unggulan di Provinsi Gorontalo yang terletak di Kabupaten Gorontalo, Kecamatan Limboto tepatnya di Kelurahan Kayubulan, Jalan Jend. Panjaitan. SMKN 1 Limboto berdiri dengan komitmen untuk mencetak tenaga kerja terampil dan profesional yang siap bersaing di dunia industri.

Memiliki berbagai kompetensi keahlian yang relevan dengan kebutuhan zaman, sekolah ini terus berinovasi dalam mengintegrasikan teknologi informasi ke dalam setiap aspek pembelajaran. Dengan fasilitas yang lengkap dan modern, SMKN 1 Limboto menjadi pilihan utama bagi generasi muda yang ingin menguasai keterampilan praktis.

Prestasi demi prestasi telah diraih, baik di tingkat daerah maupun nasional, membuktikan kualitas pendidikan yang diselenggarakan. Kemitraan yang erat dengan Dunia Usaha dan Dunia Industri (DUDI) memastikan lulusan kami memiliki daya serap yang tinggi di pasar kerja.

Sebagai sekolah rujukan, kami terus berupaya meningkatkan standar pelayanan pendidikan melalui digitalisasi layanan dan pengembangan karakter siswa yang berintegritas. Kami bangga menjadi bagian dari perjalanan masa depan generasi emas Indonesia, khususnya di Provinsi Gorontalo.',
                'image' => 'images/gambarSekolah.jpeg',
                'additional_data' => [
                    'address' => 'Jl. Jend. Panjaitan, Limboto, Gorontalo',
                    'map_iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.288220816912!2d122.9818856!3d0.61522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x327ed26c0448e86b%3A0xc3cf9387bb3cd077!2sSMK%20Negeri%201%20Limboto!5e0!3m2!1sid!2sid!4v1713780000000!5m2!1sid!2sid',
                    'opening_hours' => 'Senin - Jumat (07:00 - 15:30)'
                ]
            ]
        );

        // Visi & Misi
        Profile::updateOrCreate(
            ['section' => 'visi_misi'],
            [
                'title' => 'Visi & Misi Sekolah',
                'short_description' => 'Panduan dan komitmen kami dalam menyelenggarakan pendidikan kejuruan yang bermutu tinggi untuk masa depan yang lebih cerah.',
                'content' => 'Langkah nyata kami untuk mewujudkan visi besar sekolah.',
                'additional_data' => [
                    'vision' => 'Menjadi lembaga pendidikan kejuruan unggulan yang menghasilkan lulusan berkarakter, berkompeten, dan berdaya saing di era digital dan global.',
                    'missions' => [
                        [
                            'title' => 'Pendidikan Berbasis Karakter',
                            'description' => 'Menyelenggarakan pendidikan yang mengedepankan nilai-nilai integritas, disiplin, dan moralitas luhur kepada setiap peserta didik.'
                        ],
                        [
                            'title' => 'Link and Match dengan Industri',
                            'description' => 'Menjalin kemitraan strategis dengan Dunia Usaha dan Dunia Industri (DUDI) untuk sinkronisasi kurikulum dan penempatan kerja.'
                        ],
                        [
                            'title' => 'Inovasi Pembelajaran Digital',
                            'description' => 'Menerapkan teknologi informasi di seluruh aspek pembelajaran untuk melahirkan lulusan yang melek digital (it-literate).'
                        ],
                        [
                            'title' => 'Pengembangan Kewirausahaan',
                            'description' => 'Mendorong jiwa entrepreneurship melalui inkubator bisnis sekolah (Teaching Factory) dan pelatihan kewirausahaan praktis.'
                        ]
                    ]
                ]
            ]
        );

        // Kepala Sekolah
        Profile::updateOrCreate(
            ['section' => 'kepala_sekolah'],
            [
                'title' => 'Drs. H. Anis Naki, MM',
                'short_description' => 'Kepala Sekolah SMKN 1 Limboto',
                'content' => 'Selamat datang di portal resmi SMKN 1 Limboto. Sebagai lembaga pendidikan kejuruan, kami berkomitmen untuk memberikan layanan pendidikan terbaik yang menjembatani antara dunia pendidikan dan dunia industri.

Melalui inovasi berkelanjutan dan penguatan karakter, kami berupaya melahirkan lulusan yang tidak hanya cerdas secara intelektual, tetapi juga memiliki integritas dan kompetensi yang diakui secara nasional maupun internasional. 

Mari bersama-sama kita bangun masa depan yang gemilang bagi generasi emas Gorontalo.',
                'image' => 'images/kepala-sekolah.png'
            ]
        );
    }
}
