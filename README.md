# 🚀 Laravel Project Setup Guide

Panduan lengkap cara setup project Laravel dari awal hingga bisa berjalan di local environment.

---

## 📋 Prasyarat (Prerequisites)

Pastikan software berikut sudah terinstall di komputer kamu:

| Software           | Versi Minimum | Download                         |
| ------------------ | ------------- | -------------------------------- |
| PHP                | >= 8.2        | https://www.php.net/downloads    |
| Composer           | >= 2.x        | https://getcomposer.org/download |
| Node.js & NPM      | >= 18.x       | https://nodejs.org               |
| Git                | Latest        | https://git-scm.com              |
| MySQL / PostgreSQL | Latest        | https://www.mysql.com            |

---

## 📥 Langkah 1 — Clone Repository

Clone project dari GitHub ke komputer lokal kamu:

```bash
git clone https://github.com/AdnanAnwarR/sistem_loundry.git
```

Masuk ke folder project:

```bash
cd sistem_loundry
```

---

## 📦 Langkah 2 — Install Dependencies PHP

Install semua package PHP yang dibutuhkan menggunakan Composer:

```bash
composer install
```

> Jika kamu berada di environment production, gunakan:
>
> ```bash
> composer install --optimize-autoloader --no-dev
> ```

---

## ⚙️ Langkah 3 — Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp env.example .env
```

> **Windows:**
>
> ```bash
> copy env.example .env
> ```

Generate application key:

```bash
php artisan key:generate
```

---

## 🗄️ Langkah 4 — Konfigurasi Database

Buka file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_kamu
DB_USERNAME=root
DB_PASSWORD=password_kamu
```

Buat database baru di MySQL/PostgreSQL sesuai nama yang kamu tulis di `DB_DATABASE`.

---

## 🔄 langkah 5 - Jalankan Migration

Jalankan migration untuk membuat tabel di database:

```bash
php artisan migrate
```

## 🎨 Langkah 6 — Install Dependencies Frontend

Jika project menggunakan Vite / Mix untuk asset frontend:

```bash
npm install
```

Untuk development (dengan hot reload):

```bash
npm run dev
```

## ▶️ Langkah 7 — Jalankan Development Server

Jalankan built-in server Laravel:

```bash
php artisan serve
```

Aplikasi kamu sekarang bisa diakses di:

```
http://127.0.0.1:8000
```

---

## ❗ Troubleshooting

**Error: `php artisan` tidak dikenali**

- Pastikan PHP sudah ditambahkan ke PATH sistem kamu.

**Error: `composer` tidak dikenali**

- Pastikan Composer sudah terinstall dan PATH sudah dikonfigurasi.

**Error: `SQLSTATE[HY000] [1045] Access denied`**

- Periksa kembali `DB_USERNAME` dan `DB_PASSWORD` di file `.env`.

**Error: `APP_KEY` kosong**

- Jalankan ulang `php artisan key:generate`.

## 📄 Lisensi

Project ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).
