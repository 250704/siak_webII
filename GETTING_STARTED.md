# 🎓 PWDII P11-P12 - Sistem Manajemen Guru dan Mata Pelajaran

Selamat! Aplikasi Anda telah berhasil dibuat dengan teknologi terkini.

## ✅ Apa yang Sudah Dibuat

### 📦 Backend

- [x] **Models**: Guru dan MataPelajaran dengan relasi Many-to-Many
- [x] **Migrations**: Database tables untuk gurus, mata_pelajarans, dan pivot table
- [x] **Controllers**: GuruController dan MataPelajaranController dengan CRUD lengkap
- [x] **Routes**: REST API routes untuk semua CRUD operations
- [x] **Seeders**: Sample data (5 gurus dan 10 mata pelajarans)

### 🎨 Frontend

- [x] **Layout Master**: responsive navbar dan navigation
- [x] **Guru Views**: index, create, edit, show
- [x] **Mata Pelajaran Views**: index, create, edit, show
- [x] **Tailwind CSS**: Professional UI dengan design yang clean dan modern
- [x] **Form Validation**: Error messages dan validasi real-time
- [x] **Data Tables**: Pagination dan filtering support

### 💾 Database

- [x] **SQLite**: Default database (ready to use)
- [x] **MySQL**: Siap dikonfigurasi (lihat MYSQL_SETUP.md)
- [x] **Test Data**: Sudah di-seed otomatis

---

## 🚀 Quick Start

### 1️⃣ Terminal 1 - Run Laravel Server

```bash
cd c:\laragon\www\PWDII-P11-P12
php artisan serve
```

Akses: http://localhost:8000

### 2️⃣ Terminal 2 - Run Vite (untuk Tailwind CSS)

```bash
npm run dev
```

### 3️⃣ Buka Browser

Navigasi ke `http://localhost:8000/guru` untuk mulai menggunakan aplikasi.

---

## 📖 Fitur Aplikasi

### 📚 Guru Management

| Fitur       | Deskripsi                                       |
| ----------- | ----------------------------------------------- |
| List Guru   | Melihat daftar semua guru dengan mata pelajaran |
| Tambah Guru | Menambah guru baru dan assign mata pelajaran    |
| Edit Guru   | Mengubah data guru dan mata pelajaran           |
| Hapus Guru  | Menghapus guru dari sistem                      |
| Detail Guru | Melihat profil lengkap guru                     |

### 📖 Mata Pelajaran Management

| Fitur                 | Deskripsi                           |
| --------------------- | ----------------------------------- |
| List Mata Pelajaran   | Melihat daftar semua mata pelajaran |
| Tambah Mata Pelajaran | Menambah mata pelajaran baru        |
| Edit Mata Pelajaran   | Mengubah nama mata pelajaran        |
| Hapus Mata Pelajaran  | Menghapus mata pelajaran            |
| Detail Mata Pelajaran | Melihat guru yang mengajar          |

---

## 📁 Struktur File Penting

```
PWDII-P11-P12/
├── app/
│   ├── Http/Controllers/
│   │   ├── GuruController.php ✨
│   │   └── MataPelajaranController.php ✨
│   └── Models/
│       ├── Guru.php ✨ (with many-to-many)
│       └── MataPelajaran.php ✨ (with many-to-many)
├── database/
│   ├── migrations/
│   │   ├── *_create_gurus_table.php ✨
│   │   ├── *_create_mata_pelajarans_table.php ✨
│   │   └── *_create_guru_mata_pelajaran_table.php ✨
│   ├── seeders/
│   │   ├── DatabaseSeeder.php ✨
│   │   ├── GuruSeeder.php ✨
│   │   └── MataPelajaranSeeder.php ✨
│   └── database.sqlite ✨
├── resources/
│   ├── css/app.css (Tailwind CSS)
│   ├── js/app.js
│   └── views/
│       ├── layouts/app.blade.php ✨
│       ├── guru/
│       │   ├── index.blade.php ✨
│       │   ├── create.blade.php ✨
│       │   ├── edit.blade.php ✨
│       │   └── show.blade.php ✨
│       └── mata-pelajaran/
│           ├── index.blade.php ✨
│           ├── create.blade.php ✨
│           ├── edit.blade.php ✨
│           └── show.blade.php ✨
├── routes/web.php ✨
├── vite.config.js
├── .env
├── SETUP.md (Dokumentasi lengkap)
└── MYSQL_SETUP.md (Panduan MySQL)
```

✨ = File/folder yang baru dibuat

---

## 🎯 Relasi Database

```
┌─────────────────┐         ┌──────────────────────┐
│     GURU        │         │   MATA PELAJARAN     │
├─────────────────┤         ├──────────────────────┤
│ id (PK)         │────┐    │ id (PK)              │
│ nama_guru       │    │    │ nama_matpel          │
│ email (UNIQUE)  │    ├────│ ...                  │
│ alamat          │    │    │                      │
│ created_at      │    │    │ created_at           │
│ updated_at      │    └────│ updated_at           │
└─────────────────┘         └──────────────────────┘
                                    ▲
                                    │
                    ┌───────────────┴────────────────┐
                    │  GURU_MATA_PELAJARAN (PIVOT)   │
                    ├────────────────────────────────┤
                    │ id (PK)                        │
                    │ guru_id (FK)                   │
                    │ mata_pelajaran_id (FK)         │
                    │ created_at / updated_at        │
                    └────────────────────────────────┘
```

---

## 🔧 Perintah Artisan Penting

```bash
# Jalankan server
php artisan serve

# Database
php artisan migrate                 # Jalankan migrations
php artisan migrate:fresh          # Reset database
php artisan db:seed                # Seed test data
php artisan migrate:fresh --seed   # Reset + seed

# Cache clearing
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Debugging
php artisan tinker               # Interactive shell
php artisan list                 # Lihat semua commands
```

---

## 🐛 Troubleshooting

### Q: Database tidak terbuat?

**A:** Jalankan `php artisan migrate`

### Q: Tailwind CSS tidak bekerja?

**A:** Pastikan `npm run dev` berjalan di terminal kedua

### Q: 500 error saat membuka halaman?

**A:** Jalankan `php artisan cache:clear`

### Q: Ingin menggunakan MySQL?

**A:** Baca file `MYSQL_SETUP.md`

---

## 📚 Dokumentasi & Learning Resources

- [Laravel 11 Docs](https://laravel.com/docs/11.x)
- [Tailwind CSS](https://tailwindcss.com/docs)
- [Blade Templates](https://laravel.com/docs/11.x/blade)
- [Eloquent ORM](https://laravel.com/docs/11.x/eloquent-relationships)

---

## ✨ Fitur UI/UX

- ✅ Responsive design (mobile-friendly)
- ✅ Modern gradient navigation bar
- ✅ Professional table layouts
- ✅ Smooth transitions & hover effects
- ✅ Badge/tag styling untuk categories
- ✅ Delete confirmation dialogs
- ✅ Flash messages untuk feedback
- ✅ Form validation error display
- ✅ Pagination support
- ✅ Accessibility-friendly

---

## 📝 Catatan Tambahan

1. **Database**: Menggunakan SQLite secara default untuk kemudahan development. Bisa diganti ke MySQL kapan saja.

2. **Email Validation**: Field email sudah unique, diperlukan email unik untuk setiap guru.

3. **Relationships**: Guru bisa mengajar multiple mata pelajaran dan mata pelajaran bisa diajar multiple guru.

4. **Seeder Data**: 5 guru dan 10 mata pelajaran sudah tersedia untuk testing.

---

## 🎉 Selamat!

Aplikasi Anda siap digunakan. Mulai dengan membuka:

```
http://localhost:8000/guru
```

Happy Coding! 🚀

---

**Created with ❤️ using Laravel 11 & Tailwind CSS v4**
