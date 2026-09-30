# Latihan 1 — Routing, Controller & View

**Mata kuliah:** Pemrograman Web Berbasis Framework (D1E3A01R)
**Pertemuan:** 1 (Mg ke-1) · **Sub-CPMK 1** (bobot 5%) · **Alokasi:** 1 × 50 menit praktikum + tugas mandiri
**Sasaran:** project CodeIgniter 4 pertama berjalan, dan mahasiswa mampu menjelaskan alur `URL → Routes → Controller → View`.

---

## A. Capaian & Indikator

| Capaian | Indikator |
|---|---|
| Menjelaskan konsep teoretis pemrograman web berbasis framework | Mampu membedakan web statis, web dinamis, dan aplikasi berbasis framework |
| Mengenal CodeIgniter 4 | Mampu menyebutkan struktur folder inti dan fungsinya |
| Menerapkan routing dasar | Mampu membuat route + controller + view sendiri dan menjelaskannya |

---

## B. Ringkasan Materi (poin yang dipakai saat mengerjakan)

| Aspek | Web Statis | Web Dinamis | Web Framework |
|---|---|---|---|
| Isi halaman | tetap, ditulis manual | berubah sesuai data | dinamis + pola baku |
| Database | tidak ada | bisa ada | bisa ada, lewat **Model** |
| Cara membuat | HTML/CSS langsung | PHP + koneksi DB manual | framework (CodeIgniter) |

**MVC di CodeIgniter 4**

- **Model** (`app/Models`) — berurusan dengan database.
- **View** (`app/Views`) — tampilan HTML; hanya menampilkan data dari controller.
- **Controller** (`app/Controllers`) — menerima permintaan, memanggil model, memilih view.
- Alur: `URL → Routes (app/Config/Routes.php) → Controller → Model → DB → View → HTML`.

**Struktur folder yang wajib dikenal**

| Folder / berkas | Fungsi |
|---|---|
| `app/Controllers` | class controller |
| `app/Models` | class model |
| `app/Views` | berkas tampilan |
| `app/Config/Routes.php` | peta URL → controller |
| `public/` | satu-satunya folder publik (`index.php`) |
| `writable/` | cache, log, session, upload |
| `.env` | konfigurasi (environment, database, session) |

---

## C. Persiapan

```bash
# 1. Pastikan alat sudah siap
php -v          # harus PHP 8.x
composer -V

# 2. Jalankan project latihan ini
cd latihan-ci4
composer install
php spark serve
# buka http://localhost:8080

# (opsi lain) membuat project sendiri dari nol:
composer create-project codeigniter4/appstarter biodata-saya
```

> Jika halaman error, baca pesan errornya. CI4 menampilkan detail kesalahan saat
> `CI_ENVIRONMENT = development` (lihat berkas `.env`).

---

## D. Soal Latihan (dikerjakan mandiri)

Kerjakan berurutan. Setiap langkah **wajib disertai screenshot** dan potongan kode.

**1. Menjalankan project (10 menit)**
Jalankan project, buka `http://localhost:8080`, lalu jawab:
- Berkas view mana yang tampil di halaman itu?
- Berkas apa yang menjadi "pintu masuk" semua permintaan (front controller)?
- Apa isi `app/Config/Routes.php` sebelum Anda mengubahnya?

**2. Controller & view pertama (15 menit)**
Buat controller `Latihan1` di `app/Controllers/Latihan1.php` dengan method `index()`
yang menampilkan view `latihan1/index`. Halaman harus memuat: judul, nama Anda, dan NIM.

**3. Menambah route (10 menit)**
Tambahkan route berikut, lalu buktikan masing-masing bisa dibuka di browser:

| URL | Controller::method | Isi halaman |
|---|---|---|
| `/latihan1` | `Latihan1::index` | halaman perkenalan |
| `/latihan1/profil` | `Latihan1::profil` | biodata singkat Anda |
| `/latihan1/waktu` | `Latihan1::waktu` | tanggal & jam server |
| `/latihan1/daftar` | `Latihan1::daftar` | tabel 3 baris data (array, belum database) |

**4. Halaman statis vs dinamis (10 menit)**
Buat tabel perbandingan statis/dinamis/framework di view, tetapi **datanya disiapkan
di controller** sebagai array lalu diulang dengan `foreach` di view.
Ketik ulang (jangan copy-paste) cuplikan pola ini:

```php
// Controller
$data['perbandingan'] = [
    ['aspek' => 'Isi halaman', 'statis' => 'Tetap', 'dinamis' => 'Berubah sesuai data'],
];
return view('latihan1/index', $data);
```

```php
<!-- View -->
<?php foreach ($perbandingan as $baris): ?>
    <tr>
        <td><?= esc($baris['aspek']) ?></td>
        <td><?= esc($baris['statis']) ?></td>
        <td><?= esc($baris['dinamis']) ?></td>
    </tr>
<?php endforeach; ?>
```

**5. Halaman dinamis (10 menit)**
Pada `Latihan1::waktu()`, tentukan sapaan (`Selamat pagi/siang/sore/malam`)
berdasarkan jam server (`date('H')`), kirim ke view, dan tampilkan.
Uji dengan mengubah batas jam pada kode, bukan dengan mengubah jam komputer.

**6. Eksplorasi struktur & routing (10 menit)**
- Jalankan `php spark routes` di terminal, screenshot hasilnya, dan tunjukkan baris route milik Latihan 1.
- Sebutkan fungsi folder `app/Controllers`, `app/Models`, `app/Views`, `writable/`.
- Jelaskan mengapa folder `public/` disebut satu-satunya folder publik.

**7. Tugas mandiri (portofolio Tugas 1)**
Susun laporan singkat berisi: (a) pengertian web statis, dinamis, dan framework;
(b) penjelasan MVC dengan analogi sendiri; (c) 3 kelebihan dan 2 kekurangan CodeIgniter;
(d) screenshot seluruh langkah latihan ini.

---

## E. Yang Dikumpulkan

1. Screenshot: halaman awal CI4, `/latihan1`, `/latihan1/profil`, `/latihan1/waktu`, `/latihan1/daftar`, dan output `php spark routes`.
2. Potongan kode: `Routes.php`, controller `Latihan1`, dua view.
3. Jawaban pertanyaan langkah 1 dan 6 (tulis singkat, 3-5 baris per jawaban).

---

## F. Rambu-rambu Jawaban (untuk dosen)

Implementasi acuan ada di project ini:

| Bagian | Berkas acuan |
|---|---|
| Definisi route | `app/Config/Routes.php` (blok `LATIHAN 1`) |
| Controller | `app/Controllers/Latihan1.php` |
| View | `app/Views/latihan1/{index,profil,waktu,daftar}.php` |
| Layout bersama | `app/Views/layout/{header,footer,pesan}.php` |

Poin penilaian penting:

- Halaman default CI4 berasal dari `app/Views/welcome_message.php`, dipanggil `Home::index()`.
- Front controller: `public/index.php`.
- View **tidak boleh** mengolah data berat; data disiapkan controller.
- Setiap data yang ditampilkan dibungkus `esc()` (kebiasaan anti-XSS yang dimulai sejak Latihan 1).
- `php spark routes` menampilkan tabel route; route Latihan 1 terlihat sebagai
  `latihan1`, `latihan1/profil`, `latihan1/waktu`, `latihan1/daftar`.

Jawaban pertanyaan konseptual:

| Pertanyaan | Rambu jawaban |
|---|---|
| Berkas view halaman awal? | `app/Views/welcome_message.php` |
| Front controller? | `public/index.php` — semua request masuk lewat sini |
| Mengapa `public/` satu-satunya folder publik? | Karena document root diarahkan ke `public/`, sehingga kode aplikasi (`.env`, `app/`, `writable/`) tidak bisa diakses langsung dari browser |

---

## G. Rubrik Penilaian (skor 0-4 per kriteria)

| Kriteria | Bobot | 4 (sangat baik) | 3 (baik) | 2 (cukup) | 1 (kurang) |
|---|---|---|---|---|---|
| Project CI4 berjalan | 20% | Berjalan tanpa error, diakses lewat `public/` | Berjalan, ada 1 peringatan kecil | Berjalan setelah dibantu | Tidak berjalan |
| Route & controller | 30% | 4 route benar, penamaan rapi, `php spark routes` sesuai | 3-4 route benar | 1-2 route benar | Route tidak sesuai |
| View & pemisahan data | 30% | Data dari controller, `foreach` + `esc()` konsisten | Ada pemisahan data, `esc()` sebagian | Data ditulis langsung di view | View bercampur logika |
| Dokumentasi & presentasi | 20% | Screenshot lengkap, penjelasan konsep tepat | Screenshot lengkap, penjelasan cukup | Screenshot kurang, penjelasan lemah | Tidak ada bukti kerja |

**Nilai akhir** = Σ (skor/4 × bobot) × 100.

---

## H. Tantangan (bonus, nilai tambah)

1. Buat route berparameter: `/latihan1/sapa/(:alpha)` → `Latihan1::sapa/$1`, tampilkan
   `Halo, {nama}` dari segmen URL.
2. Pindahkan menu navigasi ke satu berkas `layout/header.php` supaya tidak ditulis ulang di setiap view.
3. Tampilkan jam server yang otomatis diperbarui dengan JavaScript (halaman tetap dinamis di sisi klien).

---

## I. Pertanyaan Refleksi

1. Apa perbedaan mendasar web statis dan web dinamis? Beri satu contoh masing-masing di lingkungan kampus.
2. Mengapa pemisahan Model-View-Controller memudahkan kerja tim?
3. Apa akibatnya bila seluruh logika dan tampilan ditulis dalam satu berkas PHP?
