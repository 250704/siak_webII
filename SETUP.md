# PWDII - Sistem Manajemen Guru dan Mata Pelajaran

Aplikasi Laravel modern untuk mengelola data guru dan mata pelajaran dengan hubungan many-to-many.

## 🚀 Fitur Utama

- **Manajemen Guru**: Tambah, ubah, hapus, dan lihat data guru
- **Manajemen Mata Pelajaran**: Tambah, ubah, hapus, dan lihat data mata pelajaran
- **Relasi Many-to-Many**: Hubung guru dengan mata pelajaran yang diajarkan
- **UI Modern**: Interface yang bersih dan profesional dengan Tailwind CSS
- **Validasi Form**: Validasi data yang komprehensif
- **Pagination**: Daftar data dengan pagination yang mudah digunakan

## 📋 Requirements

- PHP >= 8.2
- Composer
- Node.js & npm (untuk Tailwind CSS)
- MySQL atau SQLite

## 🛠️ Setup Awal

### 1. Install Dependencies

```bash
composer install
npm install
```

### 2. Environment Configuration

File `.env` sudah dikonfigurasi untuk menggunakan SQLite. Untuk mengganti ke MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=pwdii_p11_p12
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 3. Generate Application Key

```bash
php artisan key:generate
```

### 4. Run Migrations

```bash
php artisan migrate
```

### 5. Seed Database (Opsional)

Untuk mengisi database dengan data test:

```bash
php artisan db:seed
```

### 6. Start Development Server

Terminal 1 - Laravel:

```bash
php artisan serve
```

Terminal 2 - Vite (untuk Tailwind CSS):

```bash
npm run dev
```

Akses aplikasi di `http://localhost:8000`

## 📊 Struktur Database

### Table: gurus

- `id` - Primary key
- `nama_guru` - Nama guru (required)
- `email` - Email guru (unique, required)
- `alamat` - Alamat guru (nullable)
- `created_at`, `updated_at` - Timestamps

### Table: mata_pelajarans

- `id` - Primary key
- `nama_matpel` - Nama mata pelajaran (unique, required)
- `created_at`, `updated_at` - Timestamps

### Table: guru_mata_pelajaran (Pivot)

- `id` - Primary key
- `guru_id` - Foreign key ke gurus
- `mata_pelajaran_id` - Foreign key ke mata_pelajarans
- `created_at`, `updated_at` - Timestamps

## 🗂️ Struktur Project

```
app/
├── Http/
│   └── Controllers/
│       ├── GuruController.php
│       └── MataPelajaranController.php
├── Models/
│   ├── Guru.php
│   └── MataPelajaran.php
└── Providers/

database/
├── migrations/
│   ├── 2026_05_14_*_create_gurus_table.php
│   ├── 2026_05_14_*_create_mata_pelajarans_table.php
│   └── 2026_05_14_*_create_guru_mata_pelajaran_table.php
├── seeders/
│   ├── DatabaseSeeder.php
│   ├── GuruSeeder.php
│   └── MataPelajaranSeeder.php

resources/
├── css/
│   └── app.css (Tailwind CSS)
├── js/
│   └── app.js
└── views/
    ├── layouts/
    │   └── app.blade.php
    ├── guru/
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   ├── edit.blade.php
    │   └── show.blade.php
    └── mata-pelajaran/
        ├── index.blade.php
        ├── create.blade.php
        ├── edit.blade.php
        └── show.blade.php

routes/
└── web.php

vite.config.js
```

## 📝 API Routes

### Guru Routes

- `GET /guru` - Daftar semua guru
- `GET /guru/create` - Form tambah guru
- `POST /guru` - Simpan guru baru
- `GET /guru/{id}` - Detail guru
- `GET /guru/{id}/edit` - Form edit guru
- `PUT /guru/{id}` - Update guru
- `DELETE /guru/{id}` - Hapus guru

### Mata Pelajaran Routes

- `GET /mata-pelajaran` - Daftar semua mata pelajaran
- `GET /mata-pelajaran/create` - Form tambah mata pelajaran
- `POST /mata-pelajaran` - Simpan mata pelajaran baru
- `GET /mata-pelajaran/{id}` - Detail mata pelajaran
- `GET /mata-pelajaran/{id}/edit` - Form edit mata pelajaran
- `PUT /mata-pelajaran/{id}` - Update mata pelajaran
- `DELETE /mata-pelajaran/{id}` - Hapus mata pelajaran

## 🎨 Tailwind CSS

Tailwind CSS sudah dikonfigurasi di:

- `vite.config.js` - Konfigurasi Vite
- `resources/css/app.css` - Import Tailwind
- `tailwind.config.js` - Konfigurasi tema

Untuk build production:

```bash
npm run build
```

## 🔄 Hubungan Many-to-Many

Guru dapat mengajar banyak mata pelajaran, dan mata pelajaran dapat diajarkan oleh banyak guru.

### Contoh Kode:

```php
// Get all mata pelajaran untuk guru
$guru->mataPelajarans;

// Get all guru untuk mata pelajaran
$mataPelajaran->gurus;

// Attach/Sync mata pelajaran ke guru
$guru->mataPelajarans()->sync([1, 2, 3]);

// Detach mata pelajaran dari guru
$guru->mataPelajarans()->detach(1);
```

## 💾 Backup & Restore Database

### SQLite

Database tersimpan di `database/database.sqlite`

### MySQL

Backup:

```bash
mysqldump -u root -p pwdii_p11_p12 > backup.sql
```

Restore:

```bash
mysql -u root -p pwdii_p11_p12 < backup.sql
```

## 🐛 Troubleshooting

### Migrations tidak jalan

```bash
php artisan migrate:fresh  # Refresh semua migrations
```

### Tailwind CSS tidak update

```bash
npm run dev  # Restart Vite dev server
```

### Clear cache

```bash
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

## 📚 Dokumentasi Referensi

- [Laravel 11 Documentation](https://laravel.com/docs/11.x)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Eloquent ORM](https://laravel.com/docs/11.x/eloquent)
- [Blade Templates](https://laravel.com/docs/11.x/blade)

## 📄 Lisensi

Project ini dibuat untuk keperluan pembelajaran PWDII.

---

**Dibuat dengan ❤️ menggunakan Laravel 11 & Tailwind CSS**
