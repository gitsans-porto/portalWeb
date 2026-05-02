# 🏫 Portal Layanan SMKN 1 Limboto

Platform portal layanan digital terpadu untuk SMKN 1 Limboto — menghubungkan E-Raport, LMS, Dapodik, dan PeKaeL dalam satu antarmuka.

---

## ⚡ Setup Setelah Clone (WAJIB DIBACA)

> Setiap kali melakukan `git clone` atau `git pull` yang besar, ikuti langkah-langkah di bawah ini.
> Langkah ini perlu dilakukan karena beberapa file penting **sengaja tidak disimpan di GitHub**.

### Prasyarat
Pastikan sudah terinstal di komputer Anda:
- [Laragon](https://laragon.org/) (sudah termasuk PHP 8.x, MySQL, Node.js)
- [Composer](https://getcomposer.org/)
- Git

---

### Langkah 1 — Clone Repositori
```bash
git clone https://github.com/gitsans-porto/portalWeb.git
cd portalWeb
```

---

### Langkah 2 — Install Dependency PHP
```bash
composer install
```
> Ini akan membuat folder `vendor/` yang tidak ikut di GitHub karena ukurannya besar.

---

### Langkah 3 — Buat File `.env`
```bash
copy .env.example .env
```
Lalu buka file `.env` dan **sesuaikan konfigurasi database**:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_portal_web    # ← nama database di MySQL Anda
DB_USERNAME=root
DB_PASSWORD=                 # ← password MySQL (kosong jika pakai Laragon default)
```

---

### Langkah 4 — Generate App Key
```bash
php artisan key:generate
```

---

### Langkah 5 — Buat Database
Buka **phpMyAdmin** (http://localhost/phpmyadmin) dan buat database baru bernama `db_portal_web`.

---

### Langkah 6 — Jalankan Migrasi & Seeder
```bash
php artisan migrate:fresh --seed
```
> Ini akan membuat semua tabel dan mengisi data awal (layanan, profil, admin).

**Akun admin default:**
| Email | Password |
|-------|----------|
| admin@portal.test | admin123 |

---

### Langkah 7 — Link Storage (untuk foto/gambar)
```bash
php artisan storage:link
```
> Ini membuat symlink agar gambar yang di-upload bisa diakses publik.

---

### Langkah 8 — Install Dependency JS & Build CSS/JS
```bash
npm install
npm run build
```
> Ini akan mengompilasi Tailwind CSS dan JavaScript. Hasilnya masuk ke `public/build/`.

---

### Langkah 9 — Akses Website
Buka browser dan akses: **http://localhost/PortalWeb/public**

Atau jika menggunakan Virtual Host Laragon: **http://portalweb.test**

---

## 🔄 Setelah `git pull` (Update dari Tim)

Jika ada update dari tim, jalankan perintah ini setelah `git pull`:

```bash
composer install          # jika ada perubahan composer.json
npm install               # jika ada perubahan package.json
npm run build             # selalu jalankan ini setelah pull
php artisan migrate       # jika ada migration baru
php artisan db:seed       # HANYA jika ada seeder baru (tanya ke tim dulu!)
php artisan optimize:clear  # bersihkan cache
```

> ⚠️ **Jangan jalankan `migrate:fresh --seed` setelah pull** kecuali database memang ingin direset total — data yang ada akan hilang!

---

## 🗂️ Struktur Proyek

```
PortalWeb/
├── app/
│   ├── Http/Controllers/     ← Logic halaman (PortalController, dll)
│   └── Models/               ← Model database (Service, News, Profile, dll)
├── database/
│   ├── migrations/           ← Skema tabel database
│   └── seeders/              ← Data awal (ServiceSeeder, ProfileSeeder)
├── public/
│   ├── images/               ← Gambar statis (logo, foto sekolah)
│   └── build/                ← Hasil compile CSS/JS (TIDAK di-push ke Git)
├── resources/
│   ├── css/app.css           ← Source Tailwind CSS
│   ├── js/app.js             ← Source JavaScript
│   └── views/                ← Template Blade HTML
├── routes/web.php            ← Definisi semua URL/route
├── storage/app/public/       ← File upload pengguna (TIDAK di-push ke Git)
├── .env                      ← Konfigurasi rahasia (TIDAK di-push ke Git)
├── .env.example              ← Template .env (ini yang di-push)
└── README.md                 ← File ini
```

---

## ❓ Troubleshooting Umum

### ❌ Error: "Please provide a valid cache path"
```bash
mkdir storage\framework\views
mkdir storage\framework\sessions
mkdir storage\framework\cache\data
php artisan optimize:clear
```

### ❌ Halaman kosong / layanan tidak muncul
```bash
php artisan db:seed --class=ServiceSeeder
```

### ❌ Gambar tidak muncul
```bash
php artisan storage:link
```

### ❌ CSS/Tampilan berantakan
```bash
npm install
npm run build
```

### ❌ Error "Class not found" atau vendor error
```bash
composer install
php artisan optimize:clear
```

---

## 👥 Tim Pengembang

| Nama | Role |
|------|------|
| - | Project Manager |
| - | Backend Developer |
| - | Frontend Developer |

---

## 📝 Catatan Penting untuk Tim

1. **Jangan pernah push file `.env`** — simpan konfigurasi database di grup chat tim
2. **Selalu jalankan `npm run build`** sebelum push jika mengubah CSS/JS
3. **Buat migration** jika mengubah struktur database, jangan edit tabel langsung di phpMyAdmin
4. **Update README ini** jika ada langkah setup baru yang perlu dilakukan
