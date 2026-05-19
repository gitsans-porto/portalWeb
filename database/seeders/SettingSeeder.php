<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'siswa_aktif',         'value' => '1200+', 'label' => 'Siswa Aktif'],
            ['key' => 'tenaga_kependidikan',  'value' => '85+',   'label' => 'Tenaga Kependidikan'],
            ['key' => 'total_jurusan',        'value' => '9',     'label' => 'Total Jurusan'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
