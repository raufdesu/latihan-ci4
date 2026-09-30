# Kuis Singkat Latihan 1-3 (Pilihan Ganda + Kunci)

Teknik penilaian: **tes pilihan ganda dengan rubrik** (sesuai RPS).
Skor: setiap jawaban benar = 1 poin. Nilai = (jumlah benar / jumlah soal) × 100.
Waktu yang disarankan: 10 menit per pertemuan, dikerjakan sebelum/sesudah praktikum.

---

## Bagian 1 — Materi Pertemuan 1 (Latihan 1)

**1. Berkas yang menjadi pintu masuk (front controller) semua permintaan pada CodeIgniter 4 adalah …**
a. `app/index.php`  b. `public/index.php`  c. `spark`  d. `app/Config/Routes.php`

**2. Urutan alur permintaan pada aplikasi CI4 yang benar adalah …**
a. URL → View → Controller → Model
b. URL → Routes → Controller → Model → View
c. URL → Model → Routes → View
d. URL → Controller → View → Routes

**3. Tiga komponen MVC beserta tugasnya yang benar adalah …**
a. Model = tampilan, View = data, Controller = database
b. Model = data/database, View = tampilan, Controller = pengatur alur
c. Model = pengatur alur, View = data, Controller = tampilan
d. Model = tampilan, View = pengatur alur, Controller = data

**4. Pernyataan yang membedakan web statis dan web dinamis adalah …**
a. Web statis memakai database, web dinamis tidak
b. Isi web statis tetap dan ditulis manual; isi web dinamis berubah sesuai data
c. Web statis hanya bisa dibuat dengan framework
d. Web dinamis tidak dapat memakai database

**5. Perintah Composer untuk membuat project CodeIgniter 4 baru adalah …**
a. `composer create-project codeigniter4/appstarter nama-project`
b. `composer install codeigniter4`
c. `php spark new nama-project`
d. `composer require ci4/app`

---

## Bagian 2 — Materi Pertemuan 2 (Latihan 2)

**6. Fungsi `$allowedFields` pada Model CI4 adalah …**
a. Menentukan kolom yang menjadi primary key
b. Membatasi kolom yang boleh diisi dari form (mencegah mass assignment)
c. Menentukan nama tabel di database
d. Menyimpan aturan validasi otomatis

**7. Method Model untuk mengambil **semua** baris data tanpa kondisi adalah …**
a. `find($id)`  b. `first()`  c. `findAll()`  d. `countAll()`

**8. Route yang tepat untuk memproses kiriman form tambah data adalah …**
a. `$routes->get('mahasiswa/simpan', 'Mahasiswa::simpan');`
b. `$routes->post('mahasiswa/simpan', 'Mahasiswa::simpan');`
c. `$routes->view('mahasiswa/simpan', 'Mahasiswa::simpan');`
d. `$routes->add('mahasiswa/simpan', 'Mahasiswa::simpan');`

**9. Setelah `insert()` berhasil, praktik yang dianjurkan adalah …**
a. langsung `return view('mahasiswa/index')`
b. `redirect()` ke halaman daftar (pola POST-redirect-GET)
c. menampilkan `var_dump()` data
d. menutup koneksi database

**10. Fungsi `esc()` saat menampilkan data di View adalah …**
a. mempercepat halaman
b. mengubah karakter berbahaya sehingga aman dari XSS
c. mengenkripsi data dari database
d. memvalidasi input form

---

## Bagian 3 — Materi Pertemuan 3 (Latihan 3)

**11. Method yang dipakai untuk mengambil **satu** baris data berdasarkan primary key adalah …**
a. `findAll()`  b. `find($id)`  c. `where()`  d. `select()`

**12. Manakah kelompok yang **semuanya** merupakan library (bukan helper)?**
a. `url`, `form`, `text`
b. Session, Validation, Upload
c. `site_url`, `base_url`, `esc`
d. `html`, `file`, `cookie`

**13. Aturan validasi yang benar saat **mengubah** data agar NIM milik sendiri tidak dianggap duplikat adalah …**
a. `is_unique[mahasiswa.nim]`
b. `is_unique[mahasiswa.nim,id,{id}]`
c. `required|is_unique[mahasiswa.nim]`
d. `valid_nim[mahasiswa.nim]`

**14. Cara yang benar memeriksa password saat login adalah …**
a. membandingkan langsung `$input == $user['password']`
b. `md5($input) == $user['password']`
c. `password_verify($input, $user['password'])`
d. menampilkan hash lalu mencocokkan manual

**15. Pemeriksaan hak akses halaman kelola data yang benar adalah …**
a. menyembunyikan tombol Edit/Hapus di halaman
b. memeriksa `session('isLogin')` di awal setiap method controller
c. menonaktifkan klik kanan pada halaman
d. memakai JavaScript untuk memblokir URL

---

## Kunci Jawaban dan Pembahasan

| No | Jawaban | Pembahasan singkat |
|---|---|---|
| 1 | b | Semua request masuk lewat `public/index.php`; folder `public/` adalah satu-satunya document root. |
| 2 | b | Request → routing → controller → model → view → HTML kembali ke browser. |
| 3 | b | Model mengurus data, View menampilkan, Controller mengatur alur. |
| 4 | b | Ciri pembeda utama: sumber isi halaman (manual vs data). |
| 5 | a | `composer create-project codeigniter4/appstarter nama-project`. |
| 6 | b | Mencegah pengisian kolom di luar daftar yang diizinkan. |
| 7 | c | `findAll()` = SELECT tanpa kondisi; `find($id)` untuk satu baris. |
| 8 | b | Data form dikirim pada body request → route `post()`. |
| 9 | b | PRG mencegah data terkirim ganda saat halaman di-refresh. |
| 10 | b | `esc()` mengubah `<`, `>`, `"`, `'` sehingga tidak dieksekusi sebagai HTML/JS. |
| 11 | b | `find($id)` memakai primary key. |
| 12 | b | Session, Validation, Upload berbentuk class (library); `url`/`form`/`text` adalah helper. |
| 13 | b | Parameter ketiga mengecualikan baris yang sedang diubah. |
| 14 | c | Hanya `password_verify()` yang dapat mencocokkan hash dengan benar. |
| 15 | b | Hak akses wajib diperiksa di sisi server, bukan hanya menyembunyikan tombol. |

---

## Rubrik Penilaian Kuis

| Rentang nilai | Kategori | Keterangan |
|---|---|---|
| 90-100 | Sangat baik | Menguasai konsep dan penerapannya |
| 75-89 | Baik | Konsep benar, sedikit keliru pada detail teknis |
| 60-74 | Cukup | Memahami sebagian, perlu penguatan pada praktik |
| < 60 | Kurang | Perlu bimbingan tambahan dan mengulang praktikum terkait |

Soal yang paling sering salah: **12** (library vs helper) dan **13** (`is_unique` saat update).
Keduanya sebaiknya dibahas ulang singkat di awal pertemuan berikutnya.
