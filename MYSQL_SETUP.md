# Panduan Konfigurasi MySQL untuk PWDII

## Masalah

Jika mengalami error `Access denied for user 'root'@'localhost'` saat menjalankan migrations, ikuti panduan ini.

## Solusi

### Option 1: Reset MySQL Password di Laragon

1. Buka **Laragon Control Panel**
2. Klik **MySQL** → **Tools** → **Reset Password**
3. Gunakan password baru yang diberikan

### Option 2: Menggunakan Password yang Ada

Jika sudah tahu password MySQL:

1. Update file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=pwdii_p11_p12
DB_USERNAME=root
DB_PASSWORD=your_mysql_password_here
```

2. Jalankan migrations:

```bash
php artisan migrate
```

### Option 3: Create MySQL Database Manually

1. Buka MySQL Client:

```bash
mysql -u root -p
```

2. Create database:

```sql
CREATE DATABASE pwdii_p11_p12;
USE pwdii_p11_p12;
```

3. Exit MySQL dan jalankan:

```bash
php artisan migrate
php artisan db:seed
```

### Option 4: Menggunakan PHPMyAdmin Laragon

1. Buka Laragon dan klik **MySQL** → **Open PHPMyAdmin**
2. Login dengan credentials Anda
3. Create database baru dengan nama `pwdii_p11_p12`
4. Update `.env` dengan credentials yang benar
5. Jalankan migrations

## Langkah Verifikasi

1. Test koneksi MySQL:

```bash
php artisan tinker
DB::connection('mysql')->getPdo()
```

2. Jika berhasil, jalankan:

```bash
php artisan migrate
php artisan db:seed
```

## Kembali ke SQLite

Jika ingin kembali ke SQLite:

```env
DB_CONNECTION=sqlite
```

Database SQLite sudah ada di `database/database.sqlite`

## Port MySQL Alternatif

Jika port 3306 sudah terpakai, gunakan port lain:

```env
DB_PORT=3307  # atau port lain yang tersedia
```

Cek port yang tersedia:

```bash
netstat -ano | findstr :3306
```

---

**Untuk informasi lebih lanjut, baca SETUP.md**
