# Rubrik Penilaian Latihan 1-3

Mata kuliah **Pemrograman Web Berbasis Framework (D1E3A01R)** · S1 Sistem & Teknologi Informasi, FT UMMAT
Acuan: RPS — Sub-CPMK 1 (5%) dan Sub-CPMK 2 (10%), teknik tes dengan rubrik.

---

## 1. Pemetaan Latihan → CPMK → Bobot

| Latihan | Materi | Sub-CPMK | Bukti kerja | Bobot |
|---|---|---|---|---|
| Latihan 1 | Routing, controller, view, struktur CI4 | Sub-CPMK 1 | Laporan + screenshot + kuis | 5% |
| Latihan 2 | Read & Create (model, database, form) | Sub-CPMK 2 | Aplikasi biodata tahap 1 | 5% |
| Latihan 3 | Update, Delete, validasi, library/helper, hak akses | Sub-CPMK 2 | Aplikasi biodata tahap 2 + presentasi | 5% |
| | | | **Total** | **15%** |

Nilai tiap latihan dihitung dengan rumus pada masing-masing dokumen:

```
Nilai latihan = Σ (skor kriteria / 4 × bobot kriteria) × 100
```

Konversi ke nilai akhir mata kuliah: `nilai akhir = Σ (nilai latihan × bobot latihan)`.

**Contoh perhitungan**

| Latihan | Nilai latihan | Bobot RPS | Kontribusi |
|---|---|---|---|
| Latihan 1 | 85 | 5% | 4,25 |
| Latihan 2 | 80 | 5% | 4,00 |
| Latihan 3 | 90 | 5% | 4,50 |
| | | **Kontribusi Sub-CPMK 1 & 2** | **12,75** |

---

## 2. Kriteria Utama dan Indikator Perilaku

| Aspek | Indikator skor 4 | Indikator skor 2 | Indikator skor 1 |
|---|---|---|---|
| **Kebenaran fungsional** | Semua fitur berjalan sesuai spesifikasi tanpa error | Sebagian fitur berjalan, ada error yang diakali | Fitur utama tidak berjalan |
| **Struktur MVC** | Data di controller/model, view hanya menampilkan; penamaan konsisten | Ada pencampuran logika dan tampilan | Seluruh logika di view/satu berkas |
| **Keamanan dasar** | `esc()` di semua output, validasi server-side, `password_hash`/`password_verify`, aksi ubah data via POST | Sebagian diterapkan | Tidak diterapkan |
| **Kelengkapan bukti** | Screenshot tiap langkah + potongan kode + laporan runtut | Bukti kurang lengkap | Tidak ada bukti |
| **Presentasi/penjelasan** | Menjelaskan alur dan alasan teknis dengan tepat | Menjelaskan langkah saja | Tidak dapat menjelaskan |

---

## 3. Lembar Penilaian (diisi dosen/asisten)

| NIM | Nama | L1 (0-100) | L2 (0-100) | L3 (0-100) | Catatan |
|---|---|---|---|---|---|
| | | | | | |
| | | | | | |
| | | | | | |

**Catatan penilaian sikap/kolaborasi (opsional):** keaktifan bertanya, kemampuan membantu
temannya tanpa memberi jawaban langsung, dan kedisiplinan pengumpulan.

---

## 4. Daftar Periksa Cepat (dosen menilai dalam 3 menit)

Untuk setiap mahasiswa, buka aplikasinya dan jalankan urutan ini:

1. `/` tampil tanpa error.
2. `/latihan1`, `/latihan1/profil`, `/latihan1/waktu`, `/latihan1/daftar` tampil (Latihan 1).
3. `php spark routes` menampilkan route yang sesuai dengan yang dijanjikan mahasiswa.
4. `/mahasiswa` menampilkan data dari database (Latihan 2).
5. Tambah 1 data → muncul di tabel → **refresh tidak menggandakan** data.
6. Tambah data dengan NIM duplikat → muncul pesan error dan isian dipertahankan.
7. Edit 1 data → buka phpMyAdmin, tunjukkan perubahannya.
8. Hapus 1 data → ada konfirmasi → data hilang.
9. Buka `/mahasiswa` di jendela incognito → dialihkan ke `/login`.
10. Login → kelola data → logout → halaman terkunci kembali.

Setiap nomor yang lulus bernilai 10 poin; nilai akhir = jumlah poin.

---

## 5. Ketentuan Pengumpulan

| Hal | Ketentuan |
|---|---|
| Bentuk | Laporan PDF + tautan repositori/folder project (opsional) + presentasi singkat |
| Isi laporan | Tujuan, langkah kerja + screenshot, kendala & solusi, jawaban pertanyaan refleksi |
| Batas waktu | Latihan 1 sebelum pertemuan 2; Latihan 2-3 sesuai jadwal Tugas 2 (2×3×60 menit) |
| Keterlambatan | −10% per hari, maksimal 3 hari |
| Kejujuran akademik | Kode boleh belajar dari mana pun, tetapi wajib dapat menjelaskan setiap barisnya |
