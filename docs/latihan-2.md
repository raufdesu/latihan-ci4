# Latihan 2 — CRUD (1): Read & Create

**Mata kuliah:** Pemrograman Web Berbasis Framework (D1E3A01R)
**Pertemuan:** 2 (Mg ke-2) · **Sub-CPMK 2** (bobot 10% bersama Pertemuan 3) · **Alokasi:** 1 × 50 menit praktikum + tugas mandiri
**Sasaran:** aplikasi biodata mahasiswa dapat **menampilkan** data dari MySQL dan **menambah** data lewat form.

---

## A. Capaian & Indikator

| Capaian | Indikator |
|---|---|
| Menjelaskan alur request-response | Mampu menelusuri `URL → Routes → Controller → Model → View` |
| Membuat model & koneksi database | Mampu mengatur `.env`, membuat `Model` dengan `$table` dan `$allowedFields` |
| Membangun fitur Read & Create | Data tampil di tabel view; form tambah menyimpan data ke MySQL |

---

## B. Ringkasan Materi

**1. Alur request**
`1` browser minta URL → `2` `public/index.php` menangkap → `3` Router mencocokkan `Routes.php`
→ `4` method controller dipanggil → `5` controller memanggil Model → `6` controller mengirim data ke View
→ `7` HTML kembali ke browser.

**2. Routing**

```php
$routes->get('mahasiswa', 'Mahasiswa::index');           // halaman biasa
$routes->get('mahasiswa/tambah', 'Mahasiswa::tambah');   // form
$routes->post('mahasiswa/simpan', 'Mahasiswa::simpan');  // kiriman form
```

`get()` untuk halaman, `post()` untuk data kiriman form. Lihat daftar route dengan `php spark routes`.

**3. Model & koneksi database**

```php
class MahasiswaModel extends Model
{
    protected $table         = 'mahasiswa';
    protected $allowedFields = ['nim', 'nama', 'alamat'];
}
```

`$allowedFields` = kolom yang boleh diisi dari form (mencegah *mass assignment*).
Koneksi database diatur di `.env` (`database.default.*`).

**4. Read (R)** — `findAll()` di controller, `foreach` di view, dibungkus `esc()`.

**5. Create (C)** — form `POST` → `insert()` → `redirect()` (pola **POST-redirect-GET**
supaya data tidak terkirim ganda saat halaman di-refresh).

---

## C. Persiapan Database

Pilih salah satu cara:

```bash
# Cara otomatis (dipakai project ini)
php spark migrate
php spark db:seed MahasiswaSeeder

# Cara manual: jalankan docs/sql/db_biodata.sql di tab SQL phpMyAdmin
```

Periksa `.env`:

```
database.default.hostname = localhost
database.default.database = db_biodata
database.default.username = root
database.default.password =
database.default.DBDriver  = MySQLi
```

Struktur tabel `mahasiswa`: `id` (auto increment), `nim`, `nama`, `alamat`, `created_at`.

---

## D. Soal Latihan (dikerjakan mandiri)

**1. Menyiapkan data (10 menit)**
Buat database `db_biodata` dan tabel `mahasiswa`, isi minimal 3 baris data.
Screenshot hasil `SELECT * FROM mahasiswa;` di phpMyAdmin.

**2. Model (10 menit)**
Buat `app/Models/MahasiswaModel.php` dengan `$table = 'mahasiswa'` dan
`$allowedFields = ['nim', 'nama', 'alamat', 'jurusan']`. Jelaskan dalam satu paragraf
apa yang terjadi bila sebuah kolom tidak dicantumkan di `$allowedFields` lalu dikirim dari form.

**3. Route (5 menit)**
Daftarkan tiga route Read & Create pada `app/Config/Routes.php`, lalu jalankan
`php spark routes` dan tunjukkan hasilnya.

**4. Controller Read (10 menit)**
Buat `app/Controllers/Mahasiswa.php` dengan method `index()` yang mengambil seluruh data
lewat model dan mengirimkannya ke view `mahasiswa/index`:

```php
$m = new MahasiswaModel();
$data['mahasiswa'] = $m->findAll();
return view('mahasiswa/index', $data);
```

**5. View Read (10 menit)**
Buat view `mahasiswa/index.php` berisi tabel (`No`, `NIM`, `Nama`, `Alamat`) dengan
`foreach` dan `esc()`. Tambahkan tautan `Tambah Data` menuju `/mahasiswa/tambah`.

**6. Create: form + proses simpan (15 menit)**
- Method `tambah()` menampilkan view berisi form `method="post"` ke `/mahasiswa/simpan`.
- Method `simpan()` mengambil data dengan `$this->request->getPost('nim')` dan seterusnya,
  menyimpannya dengan `$m->insert([...])`, lalu **redirect** ke `/mahasiswa` dengan pesan sukses.
- Buktikan data benar-benar masuk ke MySQL (screenshot tabel di phpMyAdmin).

**7. Uji alur lengkap (5 menit)**
Isi form, simpan, pastikan data tampil di tabel, lalu **refresh** halaman daftar
dan pastikan data tidak terduplikasi. Jelaskan mengapa hal itu terjadi.

**8. Tantangan wajib: kolom `jurusan`**
Tambahkan kolom `jurusan` pada tabel (lewat phpMyAdmin atau migration), masukkan ke
`$allowedFields`, tambahkan input pada form, dan tampilkan pada tabel daftar.

**9. Tugas mandiri (bagian dari Tugas 2)**
Lengkapi aplikasi biodata dengan minimal 5 data dan rapikan tampilan
(boleh memakai CSS sederhana). Simpan laporan singkat setiap langkah.

---

## E. Yang Dikumpulkan

1. Screenshot: struktur tabel, isi tabel sebelum-sesudah tambah data, halaman `/mahasiswa`, form tambah.
2. Potongan kode: `MahasiswaModel`, tiga route, controller `index()` + `simpan()`, view `index.php` + `tambah.php`.
3. Jawaban: hasil pengujian langkah 7 (mengapa refresh tidak menggandakan data).

---

## F. Rambu-rambu Jawaban (untuk dosen)

| Bagian | Berkas acuan di project ini |
|---|---|
| Route Read & Create | `app/Config/Routes.php` (blok `LATIHAN 2`) |
| Controller | `app/Controllers/Mahasiswa.php` → `index()`, `tambah()`, `simpan()` |
| Model | `app/Models/MahasiswaModel.php` |
| View | `app/Views/mahasiswa/index.php`, `app/Views/mahasiswa/tambah.php` |
| Data awal | `app/Database/Seeds/MahasiswaSeeder.php`, `docs/sql/db_biodata.sql` |

Kesalahan umum dan penyebabnya:

| Gejala | Penyebab | Solusi |
|---|---|---|
| `Table 'db_biodata.mahasiswa' doesn't exist` | tabel belum dibuat / nama tabel beda | jalankan migration/seeder, cek nama tabel di model |
| Halaman 404 | route belum didaftarkan / salah tulis | cek `Routes.php`, jalankan `php spark routes` |
| Data tidak tersimpan tetapi tidak ada error | kolom tidak ada di `$allowedFields` | tambahkan kolom tersebut |
| Data ganda setelah refresh | tidak memakai pola POST-redirect-GET | `return redirect()->to('mahasiswa');` |
| Data muncul dengan tag HTML aneh | tidak memakai `esc()` | bungkus setiap output dengan `esc()` |

---

## G. Rubrik Penilaian (skor 0-4 per kriteria)

| Kriteria | Bobot | 4 (sangat baik) | 3 (baik) | 2 (cukup) | 1 (kurang) |
|---|---|---|---|---|---|
| Database & koneksi | 20% | Tabel benar, `.env` benar, ada data awal | Tabel & koneksi benar | Tabel ada, koneksi perlu diperbaiki | Belum terkoneksi |
| Model & routing | 20% | Model rapi (`$table`, `$allowedFields`), route tepat | Model & route benar | Ada kesalahan kecil | Belum sesuai |
| Read (tampil data) | 25% | Data tampil lengkap, rapi, `esc()` konsisten | Data tampil benar | Tampil sebagian/berantakan | Tidak tampil |
| Create (form + simpan) | 25% | Simpan berhasil, redirect + pesan, tidak duplikat saat refresh | Simpan berhasil | Simpan berhasil setelah dibantu | Gagal menyimpan |
| Tantangan `jurusan` & kerapian | 10% | Dikerjakan penuh + tampilan rapi | Dikerjakan sebagian | Dicoba | Tidak dikerjakan |

**Nilai akhir** = Σ (skor/4 × bobot) × 100.

---

## H. Pertanyaan Refleksi

1. Apa fungsi `$allowedFields` dan risiko apa yang dicegahnya?
2. Mengapa setelah `insert()` kita melakukan `redirect()` dan bukan langsung `return view(...)`?
3. Kapan memakai `get()` dan kapan memakai `post()` pada route?
