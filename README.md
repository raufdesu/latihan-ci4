# Aplikasi Latihan CodeIgniter 4 — Biodata Mahasiswa

Project contoh (**kunci/referensi**) untuk **Latihan 1-3** mata kuliah
**Pemrograman Web Berbasis Framework (D1E3A01R)** — S1 Sistem & Teknologi Informasi, FT UMMAT.

Materi yang dicakup:

| Latihan | Materi | Pertemuan | Fitur di project ini |
|---|---|---|---|
| **Latihan 1** | Routing, Controller, View, struktur CI4 | 1 | `/latihan1`, `/latihan1/profil`, `/latihan1/waktu`, `/latihan1/daftar` |
| **Latihan 2** | CRUD (1): Read & Create | 2 | `/mahasiswa` (tabel data), `/mahasiswa/tambah`, `POST /mahasiswa/simpan` |
| **Latihan 3** | CRUD (2): Update, Delete, Validasi, Library/Helper, Hak Akses | 3 | `/mahasiswa/edit/{id}`, `update`, `hapus`, validasi, flashdata, `/login`, `/logout`, proteksi halaman |

Soal latihan, rubrik, kuis, dan skrip SQL ada di folder [`docs/`](docs/README.md).

---

## Menjalankan Project

```bash
# 1. Dependensi
composer install

# 2. Konfigurasi: berkas .env sudah disiapkan untuk db_biodata (MySQL, user root, tanpa password).
#    Sesuaikan bila konfigurasi MySQL Anda berbeda.

# 3. Database + data awal
php spark migrate
php spark db:seed MahasiswaSeeder
php spark db:seed UserSeeder

# 4. Jalankan
php spark serve
# buka http://localhost:8080
```

Alternatif tanpa migration: jalankan `docs/sql/db_biodata.sql` pada tab **SQL** phpMyAdmin.

**Menggunakan Laragon/Apache (virtual host):** ubah `app.baseURL` di `.env` menjadi
`app.baseURL = 'http://latihan-ci4.test/'` (sesuai nama host Anda), lalu akses lewat
`http://latihan-ci4.test/`.

### Akun untuk praktikum

| Username | Password | Peran |
|---|---|---|
| `admin` | `admin123` | Administrator |
| `operator` | `operator123` | Operator Akademik |

Password disimpan sebagai hash (`password_hash` dengan `PASSWORD_DEFAULT`) — lihat
`app/Database/Seeds/UserSeeder.php`.

---

## Alur Belajar yang Disarankan

1. Baca `docs/latihan-1.md`, kerjakan **sendiri** di project terpisah, baru bandingkan hasilnya dengan berkas di sini.
2. Lanjutkan ke `docs/latihan-2.md` (Read & Create) dan `docs/latihan-3.md` (Update, Delete, validasi, login).
3. Uji dengan daftar periksa pada `docs/rubrik-penilaian.md` (bagian *Daftar Periksa Cepat*).
4. Kerjakan `docs/kuis.md` untuk memastikan konsepnya sudah kuat.

Urutan menelusuri kode (mengikuti alur request):

```
app/Config/Routes.php  →  app/Controllers/…  →  app/Models/…  →  app/Views/…
```

---

## Struktur Berkas Penting

```
app/
├── Config/Routes.php              # peta URL → controller (Latihan 1-3)
├── Controllers/
│   ├── BaseController.php         # memuat helper url/form/html + service session
│   ├── Home.php                   # halaman daftar latihan
│   ├── Latihan1.php               # LATIHAN 1
│   ├── Mahasiswa.php              # LATIHAN 2 (index, tambah, simpan) + LATIHAN 3 (edit, update, hapus, validasi, cekLogin)
│   └── Login.php                  # LATIHAN 3 (autentikasi & logout)
├── Models/
│   ├── MahasiswaModel.php         # tabel mahasiswa ($allowedFields, timestamps)
│   └── UserModel.php              # tabel user (login)
├── Database/
│   ├── Migrations/                # pembuat tabel mahasiswa & user
│   └── Seeds/                     # data awal mahasiswa & akun login
└── Views/
    ├── layout/{header,footer,pesan}.php   # kerangka + tampilan flashdata
    ├── home/index.php
    ├── latihan1/{index,profil,waktu,daftar}.php
    ├── mahasiswa/{index,tambah,edit}.php
    └── login/index.php

docs/                              # soal, rubrik, kuis, skrip SQL
public/assets/css/style.css        # gaya tampilan (tanpa framework CSS)
```

---

## Lingkungan yang Dipakai

| Komponen | Versi |
|---|---|
| PHP | 8.3 (minimal 7.4, disarankan 8.x) |
| CodeIgniter | 4.7.4 |
| Database | MySQL/MariaDB — database `db_biodata` |

Catatan: `.env` sudah memuat `CI_ENVIRONMENT = development` supaya detail error tampil saat belajar,
dan `app.indexPage = ''` supaya URL bersih (tanpa `index.php`).
