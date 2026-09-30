# Dokumentasi Latihan — Pemrograman Web Berbasis Framework (CI4)

Folder ini berisi **soal, rubrik, kuis, dan skrip SQL** untuk Latihan 1-4
(materi Pertemuan 1-4). Semua latihan memakai **CodeIgniter 4**.

---

## Isi Folder

| Berkas | Untuk | Isi |
|---|---|---|
| [`latihan-1.md`](latihan-1.md) | Mahasiswa + dosen | Routing, controller, view, struktur CI4 (Pertemuan 1) |
| [`latihan-2.md`](latihan-2.md) | Mahasiswa + dosen | CRUD Read & Create: model, database, form (Pertemuan 2) |
| [`latihan-3.md`](latihan-3.md) | Mahasiswa + dosen | Update, Delete, validasi, library/helper, hak akses (Pertemuan 3) |
| [`latihan-4.md`](latihan-4.md) | Mahasiswa + dosen | SCRUM: peran, artefak, event, Product & Sprint Backlog, papan sprint (Pertemuan 4) |
| [`template-scrum.md`](template-scrum.md) | Mahasiswa | Lembar kerja SCRUM siap isi + contoh terisi aplikasi biodata (Post Test 2.1) |
| [`rubrik-penilaian.md`](rubrik-penilaian.md) | Dosen | Pemetaan bobot Sub-CPMK, rubrik, lembar nilai, daftar periksa cepat |
| [`kuis.md`](kuis.md) | Dosen | 15 soal pilihan ganda + kunci & pembahasan |
| [`sql/db_biodata.sql`](sql/db_biodata.sql) | Mahasiswa | Skrip SQL manual untuk phpMyAdmin (tabel `mahasiswa` & `user`) |

Setiap dokumen latihan memakai urutan yang sama:

1. **Capaian & indikator**
2. **Ringkasan materi** (poin yang dipakai saat mengerjakan)
3. **Persiapan**
4. **Soal latihan** (langkah kerja bernomor, dibagikan ke mahasiswa)
5. **Yang dikumpulkan** (bukti kerja)
6. **Rambu-rambu jawaban** (kunci ringkas + pemetaan ke berkas project — untuk dosen)
7. **Rubrik penilaian**
8. **Tantangan (bonus)** dan **pertanyaan refleksi**

> Bagian 6 sebaiknya **tidak** dibagikan bersama soal. Untuk mahasiswa, cetak/bagikan
> bagian 1-5 dan 7-8 saja.

---

## Cara Memakai Bersama Project

| Peran | Langkah |
|---|---|
| **Dosen** | Jalankan project (lihat `../README.md`), gunakan *Daftar Periksa Cepat* pada `rubrik-penilaian.md` saat menilai, dan `kuis.md` untuk tes tulis. |
| **Mahasiswa** | Kerjakan soal di project **milik sendiri** (`composer create-project codeigniter4/appstarter biodata-saya`), baru bandingkan dengan berkas acuan di project ini. |

Pemetaan soal → berkas acuan di project (untuk kunci):

| Latihan | Route | Controller | Model | View |
|---|---|---|---|---|
| 1 | `app/Config/Routes.php` (blok LATIHAN 1) | `app/Controllers/Latihan1.php` | — | `app/Views/latihan1/*` |
| 2 | blok LATIHAN 2 | `Mahasiswa::index/tambah/simpan` | `MahasiswaModel` | `app/Views/mahasiswa/{index,tambah}.php` |
| 3 | blok LATIHAN 3 | `Mahasiswa::edit/update/hapus` + `Login` | `MahasiswaModel`, `UserModel` | `app/Views/mahasiswa/edit.php`, `app/Views/login/index.php` |
| 4 | blok LATIHAN 4 (`scrum`) | `Scrum::index` | — (data disiapkan di controller) | `app/Views/scrum/index.php` |

---

## Alur Praktikum yang Disarankan (4 pertemuan)

| Pertemuan | Praktikum di kelas (50 menit) | Tugas mandiri |
|---|---|---|
| 1 | Soal 1-6 `latihan-1.md` — project CI4 hidup + halaman statis/dinamis | Laporan + presentasi (Tugas 1), kuis Bagian 1 |
| 2 | Soal 1-7 `latihan-2.md` — database, model, Read, Create | Lengkapi kolom `jurusan` & 5 data (bagian Tugas 2), kuis Bagian 2 |
| 3 | Soal 1-8 `latihan-3.md` — Update, Delete, validasi, login | Selesaikan aplikasi + presentasi (Post-test 1), kuis Bagian 3 |
| 4 | Soal 1-10 `latihan-4.md` — Product Backlog, Sprint Backlog, papan sprint, DoD | Kerjakan Sprint 1 (Tugas 3), kumpulkan Post Test 2.1 |

---

## Catatan Teknis

- Versi acuan: **CodeIgniter 4.7.4**, PHP 8.3, MySQL/MariaDB, database `db_biodata`.
- Perintah sering dipakai:

```bash
php spark serve          # jalankan server pengembangan (http://localhost:8080)
php spark routes         # lihat daftar route
php spark migrate        # buat tabel dari migration
php spark db:seed MahasiswaSeeder
php spark db:seed UserSeeder
php spark migrate:refresh          # bangun ulang tabel (rollback + migrate)
php spark db:seed MahasiswaSeeder  # jalankan seeder terpisah untuk mengisi data awal
```

- Bila muncul error `Table 'db_biodata.mahasiswa' doesn't exist`, jalankan `php spark migrate`
  atau jalankan `sql/db_biodata.sql` di phpMyAdmin.
- Akun praktikum: `admin/admin123` dan `operator/operator123`.
