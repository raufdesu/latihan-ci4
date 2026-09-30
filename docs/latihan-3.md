# Latihan 3 — CRUD (2): Update, Delete, Library/Helper & Hak Akses

**Mata kuliah:** Pemrograman Web Berbasis Framework (D1E3A01R)
**Pertemuan:** 3 (Mg ke-3) · **Sub-CPMK 2** (bobot 10% bersama Pertemuan 2) · **Alokasi:** 1 × 50 menit praktikum + tugas mandiri
**Sasaran:** CRUD lengkap (Create-Read-Update-Delete) + validasi + login sederhana, sehingga
halaman kelola data hanya bisa diakses setelah login.

---

## A. Capaian & Indikator

| Capaian | Indikator |
|---|---|
| Mengimplementasikan Update & Delete | Form edit terisi data lama; perubahan & penghapusan tersimpan di database |
| Membedakan library & helper | Mampu memakai Session, Validation, serta helper `url`, `form`, `esc()` pada tempat yang tepat |
| Menjelaskan autentikasi & otorisasi | Mampu membuat login sederhana dan melindungi halaman di sisi server |
| Menyelesaikan aplikasi biodata | Seluruh alur login → tambah → ubah → hapus → logout berjalan tanpa error |

---

## B. Ringkasan Materi

**1. Update (U)**
Route berparameter → `find($id)` (satu baris berdasarkan primary key) → form terisi data lama →
`update($id, [...])` → redirect. Periksa dulu datanya ada; bila `find()` mengembalikan `null`,
kembalikan pengguna ke daftar data.

**2. Delete (D)**
`delete($id)` + konfirmasi dari pengguna. Aksi yang mengubah data (tambah/ubah/hapus)
sebaiknya lewat **POST**, bukan tautan yang bisa diklik sembarangan. CI4 juga punya
*soft delete* (`$useSoftDeletes = true` + kolom `deleted_at`).

**3. Library vs Helper**

| Aspek | Library | Helper |
|---|---|---|
| Bentuk | class (objek) | fungsi prosedural |
| Contoh CI4 | Session, Validation, Upload, Email, Pagination | `url`, `form`, `html`, `text`, `file` |
| Cara pakai | `$this->session->set(...)`, `$this->validate(...)` | `site_url()`, `form_open()`, `esc()` |
| Dimuat di | controller / BaseController | `BaseController::$helpers = ['url','form']` |

**4. Session & flashdata**
`session()->set('isLogin', true)` menyimpan status login; `setFlashdata('pesan', '...')`
untuk pesan sekali pakai yang tampil setelah redirect.

**5. Validasi**

```php
if (! $this->validate([
    'nim'  => 'required|min_length[3]|is_unique[mahasiswa.nim]',
    'nama' => 'required|min_length[3]',
])) {
    return redirect()->back()->withInput()->with('validasi', $this->validator->getErrors());
}
```

Saat **update**, NIM milik sendiri tidak boleh dianggap duplikat:
`is_unique[mahasiswa.nim,id,{id}]`.

**6. Hak akses**

| Istilah | Pertanyaan | Alat |
|---|---|---|
| Autentikasi | "Siapa kamu?" | username + password (`password_verify()` terhadap hash) |
| Otorisasi | "Apa yang boleh kamu lakukan?" | cek `session('isLogin')` di setiap method yang dilindungi |

> Prinsip: **jangan hanya menyembunyikan tombol** — selalu periksa hak akses di sisi server.

---

## C. Persiapan

```bash
# Tabel user + akun praktikum
php spark migrate
php spark db:seed UserSeeder      # admin/admin123 dan operator/operator123
```

Alternatif manual: jalankan bagian tabel `user` pada `docs/sql/db_biodata.sql`.
Password **selalu** disimpan sebagai hash (`password_hash($p, PASSWORD_DEFAULT)`),
tidak pernah plain text.

---

## D. Soal Latihan (dikerjakan mandiri)

**1. Update: form edit (15 menit)**
- Daftarkan route `GET mahasiswa/edit/(:num)` → `Mahasiswa::edit/$1`.
- Buat method `edit($id)`: ambil data dengan `find($id)`, tolak bila tidak ada, kirim ke view.
- Buat view `edit.php`: form yang sama dengan form tambah, tetapi `value`-nya diisi data lama
  dan `action`-nya menuju `POST mahasiswa/update/{id}`.

**2. Update: proses simpan perubahan (10 menit)**
Buat method `update($id)`: validasi → `update($id, [...])` → redirect ke daftar dengan pesan sukses.
Buktikan perubahan terlihat di phpMyAdmin.

**3. Delete (10 menit)**
Daftarkan route `POST mahasiswa/hapus/(:num)` → `Mahasiswa::hapus/$1`.
Tambahkan tombol hapus pada kolom aksi di `index.php` dengan konfirmasi JavaScript
(`onsubmit="return confirm('Yakin hapus data ini?')"`). Buktikan data hilang dari database.

**4. Validasi + pesan error (10 menit)**
Tambahkan aturan `required`, `min_length`, dan `is_unique` untuk NIM, serta `required|min_length[3]`
untuk nama (termasuk pengecualian NIM sendiri saat update). Tampilkan daftar error di form.
Uji: (a) NIM kosong, (b) nama 2 huruf, (c) NIM duplikat, (d) NIM sendiri saat update.
Tunjukkan keempat hasilnya.

**5. Flashdata di semua aksi CRUD (5 menit)**
Pastikan setiap aksi (simpan, update, hapus, gagal validasi) menampilkan pesan sukses/gagal
yang **hilang setelah dibaca** (muat ulang halaman: pesan tidak muncul lagi).

**6. Tabel user + login sederhana (15 menit)**
- Buat tabel `user` (`id`, `username`, `password`, `nama_lengkap`).
- Buat controller `Login`: `index()` (form), `proses()` (cek user → `password_verify()` →
  `session()->set(['isLogin' => true, 'username' => ...])`), `logout()` (`session()->destroy()`).
- Jelaskan mengapa password **tidak boleh** disimpan apa adanya.

**7. Proteksi halaman kelola data (10 menit)**
Tambahkan pemeriksaan di awal **setiap** method `Mahasiswa`:

```php
if (! $this->session->get('isLogin')) {
    return redirect()->to('login');
}
```

Buktikan: buka `/mahasiswa` di jendela *incognito* (belum login) → dialihkan ke `/login`.
Buka `/mahasiswa/edit/1` langsung tanpa login → juga dialihkan.

**8. Uji seluruh alur (5 menit)**
`login → tambah → ubah → hapus → logout`, lalu pastikan setelah logout halaman terkunci kembali.
Catat setiap langkah dengan screenshot.

**9. Tugas mandiri (Tugas 2 / Post-test 1)**
Lengkapi aplikasi biodata: CRUD penuh + validasi + flashdata + login, tampilan rapi,
lalu presentasikan. Tambahkan minimal satu kolom baru buatan sendiri (mis. `email` atau `angkatan`).

---

## E. Yang Dikumpulkan

1. Screenshot: form edit terisi, bukti update di phpMyAdmin, konfirmasi hapus, pesan validasi (4 kasus), halaman login, percobaan akses tanpa login, dan alur logout.
2. Potongan kode: route Latihan 3, `edit()`, `update()`, `hapus()`, aturan validasi, `Login` controller, dan pemeriksaan session.
3. Jawaban: mengapa hapus memakai POST; apa bedanya autentikasi dan otorisasi; mengapa password di-hash.

---

## F. Rambu-rambu Jawaban (untuk dosen)

| Bagian | Berkas acuan di project ini |
|---|---|
| Route berparameter & login | `app/Config/Routes.php` (blok `LATIHAN 3`) |
| Update & Delete | `app/Controllers/Mahasiswa.php` → `edit()`, `update()`, `hapus()` |
| Validasi + pesan Indonesia | `app/Controllers/Mahasiswa.php` → `aturanValidasi()`, `pesanValidasi()` |
| Flashdata | `app/Views/layout/pesan.php`, `with('pesan'/'gagal'/'validasi', ...)` |
| Session & login | `app/Controllers/Login.php`, `app/Models/UserModel.php`, `app/Database/Seeds/UserSeeder.php` |
| Proteksi halaman | `Mahasiswa::cekLogin()` (dipanggil di setiap method) |
| Helper | `app/Controllers/BaseController.php` (`$helpers = ['url','form','html']`) |
| View dengan `esc()` & `form_open()` | `app/Views/mahasiswa/{index,edit}.php`, `app/Views/login/index.php` |

Poin kunci penilaian:

- `update()` **wajib** memakai pengecualian ID pada `is_unique`, jika tidak, menyimpan tanpa
  mengubah NIM akan selalu gagal.
- Hapus memakai POST + konfirmasi; route GET untuk hapus tidak disediakan (sengaja), sehingga
  membuka `/mahasiswa/hapus/1` di browser menghasilkan 404.
- `password_verify($input, $hash)` adalah satu-satunya cara membandingkan password hash.
- Setelah `session()->destroy()` flashdata tidak dapat ditampilkan pada halaman berikutnya —
  ini perilaku normal; halaman login karena itu menampilkan petunjuk login, bukan pesan flash.
- Pemeriksaan login dilakukan di server. Menyembunyikan tombol saja **tidak** dinilai benar.

---

## G. Rubrik Penilaian (skor 0-4 per kriteria)

| Kriteria | Bobot | 4 (sangat baik) | 3 (baik) | 2 (cukup) | 1 (kurang) |
|---|---|---|---|---|---|
| Update (form + proses) | 20% | Form terisi benar, data tidak ada ditangani, update tersimpan | Update berjalan | Update berjalan setelah dibantu | Gagal |
| Delete | 15% | Hapus POST + konfirmasi, pesan sukses, data hilang | Hapus berjalan | Hapus berjalan dengan tautan GET | Gagal |
| Validasi | 20% | 4 kasus uji benar, pesan jelas, isian dipertahankan, NIM sendiri tidak dianggap duplikat | 3 kasus benar | 1-2 kasus benar | Tidak ada validasi |
| Library & helper | 15% | Session + Validation + `form_open`/`site_url`/`esc()` dipakai tepat | Sebagian besar tepat | Pemakaian tertukar | Tidak dipakai |
| Hak akses (login & proteksi) | 20% | Login hash, session, proteksi semua method, logout, akses langsung ditolak | Login & proteksi berjalan | Login berjalan, proteksi sebagian | Tidak ada proteksi |
| Kerapian & presentasi | 10% | Struktur rapi, komentar jelas, presentasi lancar | Rapi, presentasi cukup | Kurang rapi | Tidak presentasi |

**Nilai akhir** = Σ (skor/4 × bobot) × 100.

---

## H. Tantangan (bonus)

1. **Soft delete**: aktifkan `$useSoftDeletes = true`, tambahkan kolom `deleted_at`, dan
   tampilkan tombol "Pulihkan" untuk data terhapus.
2. **Pencarian**: tambahkan form cari dan method model `cari($keyword)` (lihat `MahasiswaModel::cari()`).
3. **Filter CI4**: pindahkan pemeriksaan login dari controller ke `app/Config/Filters.php`
   (materi lanjutan Mg 6-7) dan bandingkan kelebihannya.
4. **Peran pengguna**: tambahkan kolom `role` (admin/user) dan batasi hak hapus hanya untuk admin.

---

## I. Pertanyaan Refleksi

1. Apa perbedaan autentikasi dan otorisasi? Beri contoh keduanya pada aplikasi biodata ini.
2. Mengapa aksi hapus sebaiknya memakai POST, bukan tautan GET?
3. Apa risiko menyimpan password tanpa hash, dan bagaimana `password_verify()` mengatasinya?
4. Apa perbedaan mendasar library dan helper? Kapan Anda memilih masing-masing?
