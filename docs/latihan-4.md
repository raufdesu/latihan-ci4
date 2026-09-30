# Latihan 4 — SCRUM: Konsep, Peran & Artefak

**Mata kuliah:** Pemrograman Web Berbasis Framework (D1E3A01R)
**Pertemuan:** 4 (Mg ke-4) · **Sub-CPMK 3** (bobot 10% bersama Pertemuan 5) · **Alokasi:** 1 × 50 menit praktikum + 2 × (3 × 60 menit) tugas mandiri
**Sasaran:** menyusun **Product Backlog**, **Sprint Backlog**, **papan Sprint**, dan **Definition of Done**
untuk aplikasi web Anda sendiri — lalu **mulai mengerjakan Sprint 1** sebagai dasar **Tugas 3**.

> **Catatan penting:** pada pertemuan ini yang dinilai **bukan kode**, melainkan **perencanaan kerja**.
> Aplikasi biodata yang sudah Anda bangun pada Latihan 1-3 menjadi bahan bakunya.
> Kode ditulis setelah rencana disetujui, dan hasilnya dinilai pada Pertemuan 5.

---

## A. Capaian & Indikator

| Capaian | Indikator |
|---|---|
| Menjelaskan mengapa proyek web butuh metodologi | Mampu membandingkan Waterfall dan Agile serta memberi contoh kegagalan proyek tanpa metode |
| Menjelaskan peran, artefak, dan event SCRUM | Mampu menyebutkan tugas Product Owner, Scrum Master, Developer Team dan 3 artefak inti |
| Menyusun Product Backlog & Sprint Backlog | Backlog ≥ 8 item berbentuk user story, berprioritas P0/P1/P2, dengan estimasi S/M/L |
| Menerapkan ritme Sprint | Papan Sprint terisi, Definition of Done tertulis, jadwal Daily Scrum/Sprint Review ada |
| Mendemonstrasikan Increment | ≥ 2 item backlog P0 benar-benar selesai dan dapat ditunjukkan memenuhi DoD |

**Kaitan RPS:** Sub-CPMK 3 — *mampu mengimplementasikan SCRUM dalam pengembangan web dan Git dalam
kolaborasi proyek* (CPMK 3). Bukti kerja pertemuan ini adalah **Post Test 2.1** (daftar pengerjaan web
dalam SCRUM) dan menjadi rencana resmi **Tugas 3** (membuat fitur baru + presentasi).

---

## B. Ringkasan Materi

### 1. Mengapa proyek web butuh metodologi?

Tanpa metode, gejala klasiknya selalu sama: fitur berubah-ubah di tengah jalan, deadline molor,
kerja dobel, dan hasil tidak sesuai keinginan pemilik produk. Penyebabnya bukan kemampuan coding,
melainkan **kebutuhan tidak jelas di awal**, **tidak ada prioritas** (semua fitur terasa penting),
dan **komunikasi yang tidak terjadwal**.

| Pendekatan | Cara kerja | Cocok dipakai bila |
|---|---|---|
| **Waterfall** | Tahap berurutan kaku: analisis → desain → coding → tes | Kebutuhan sudah pasti dan jarang berubah |
| **Agile** | Iteratif & adaptif: bangun sebagian kecil → tunjukkan → perbaiki → ulangi | Kebutuhan masih berkembang (umum pada proyek web) |

Prinsip Agile: *berikan nilai kecil yang berguna sesering mungkin, lalu belajar dari umpan balik.*
**SCRUM** adalah kerangka kerja Agile yang paling banyak dipakai untuk pengembangan web.

### 2. Apa itu SCRUM?

SCRUM (bukan singkatan) = kerangka kerja pengembangan produk **iteratif berbasis Sprint**.

- **Sprint** — periode kerja tetap **1-4 minggu**. Di mata kuliah ini: **1 minggu**, sinkron jadwal kelas.
- **Increment** — bagian produk yang **sudah jadi** dan bisa dipakai/didemonstrasikan, bukan kode mentah.
- **Lima nilai SCRUM** — komitmen, fokus, keterbukaan, hormat, keberanian.

> SCRUM mengatur **"cara kerja"**, bukan teknik coding. Teknik (CI4, Git) dipelajari paralel.

### 3. Tiga peran

| Peran | Tanggung jawab | Analogi restoran |
|---|---|---|
| **Product Owner (PO)** | Suara user/pemilik produk; menyusun & mengurutkan Product Backlog; memutuskan prioritas dan kapan fitur "cukup" | Penentu menu — memutuskan hidangan apa yang paling bernilai bagi tamu |
| **Scrum Master (SM)** | Memastikan proses SCRUM berjalan; **menghilangkan hambatan**; **bukan bos tim** | Pengatur dapur — melancarkan semua agar koki fokus memasak |
| **Developer Team** | Swakelola; memecah pekerjaan, membangun Increment, menguji — 3-9 orang | Para koki — yang benar-benar memasak hidangannya |

> Di proyek kuliah satu orang boleh merangkap (mis. semua jadi developer + satu PO), tetapi
> **tuliskan jelas siapa memegang peran apa**.

### 4. Tiga artefak — "dokumen hidup"

1. **Product Backlog** — daftar **SEMUA** kebutuhan produk, diurutkan prioritas, ditulis sebagai
   user story, dikelola PO, dan **terus diperbarui**.
2. **Sprint Backlog** — item Product Backlog yang **dipilih untuk Sprint ini** + rencana kerjanya.
   Dipilih saat Sprint Planning dan **tidak berubah** selama Sprint berjalan.
3. **Increment** — hasil kerja Sprint yang memenuhi **Definition of Done**.

Contoh untuk aplikasi biodata: backlog berisi *Login admin, CRUD data mahasiswa, Cetak laporan PDF,
Halaman profil, Pencarian data, Dashboard ringkas*; Sprint 1 memilih *Login admin + CRUD mahasiswa*.

> Backlog ibarat **daftar menu** restoran; Sprint Backlog = **pesanan yang sedang dimasak** minggu ini.

### 5. Menulis user story (isi backlog)

Format baku:

```
Sebagai <peran>, saya ingin <kemampuan/fitur>, agar <manfaat/alasan>.
```

| Benar | Kurang baik |
|---|---|
| "Sebagai admin, saya ingin login dengan username & password, agar data mahasiswa tidak bisa diubah sembarangan" | "Buat halaman login" (tidak jelas siapa & untuk apa) |
| "Sebagai mahasiswa, saya ingin melihat biodata saya, agar tahu data yang tersimpan benar" | "Perbaiki tampilan" (tidak terukur) |

**INVEST** — syarat backlog item yang baik: **I**ndependent, **N**egotiable, **V**aluable,
**E**stimable, **S**mall, **T**estable.
Estimasi sederhana: **S** (kecil, ± sehari), **M** (2-3 hari), **L** (seminggu atau lebih).
Bila sebuah item berukuran **L**, **pecah** menjadi beberapa item kecil.

Prioritas yang dipakai di mata kuliah ini:

| Prioritas | Arti | Contoh |
|---|---|---|
| **P0** | Wajib — tanpa ini produk tidak berguna | Login, CRUD inti, validasi |
| **P1** | Penting — menambah nilai nyata | Pencarian, paginasi, ekspor data |
| **P2** | Nice-to-have — dikerjakan bila ada waktu | Dashboard grafik, mode gelap, cetak PDF |

### 6. Empat event (upacara) dan Definition of Done

| Event | Kapan | Isi |
|---|---|---|
| **Sprint Planning** | Awal Sprint | Tim memilih item backlog & menyusun Sprint Backlog |
| **Daily Scrum** | Tiap hari, maks 15 menit | 3 pertanyaan: kemarin apa? hari ini apa? ada hambatan? — **untuk sinkronisasi, bukan laporan ke atasan** |
| **Sprint Review** | Akhir Sprint | Demo Increment ke PO & pemangku kepentingan, terima umpan balik |
| **Sprint Retrospective** | Setelah Review | Evaluasi **cara kerja** tim: apa yang baik, apa yang diperbaiki |

**Definition of Done (DoD)** = kriteria "selesai" yang disepakati tim, misalnya: kode berjalan di CI4,
input tervalidasi, sudah diuji, dan sudah di-*push* ke Git.

> Tanpa ritme ini, SCRUM tinggal "papan tempel" — kedisiplinan acara yang membuatnya hidup.

### 7. Kelebihan & kekurangan (jujur)

- **Kelebihan:** adaptif terhadap perubahan, transparan, risiko kecil (kegagalan terdeteksi di Sprint
  awal), prioritas jelas (fitur bernilai tinggi lebih dulu).
- **Kekurangan:** butuh disiplin & komitmen seluruh tim; PO harus aktif memutuskan; kurang cocok untuk
  proyek super kecil tanpa PO jelas; estimasi tetap sulit — SCRUM **mengelola** ketidakpastian, bukan
  menghilangkannya.

> SCRUM tidak menjanjikan proyek cepat. Ia membuat **keterlambatan dan masalah terlihat lebih awal**.

---

## C. Persiapan

**1. Siapkan alat papan Sprint** — pilih salah satu:

| Pilihan | Cara |
|---|---|
| Trello | Buat board, tiga list: `To Do`, `In Progress`, `Done` |
| GitLab Board | Repositori → Issues → Board (label `P0`/`P1`/`P2`) |
| Spreadsheet / tabel | Tiga kolom `To Do` \| `In Progress` \| `Done` (paling ringan, selalu bisa) |

**2. Siapkan berkas kerja.** Salin [`template-scrum.md`](template-scrum.md) menjadi berkas baru
(mis. `scrum-[kelompok-anda].md`), lalu isi. Template berisi tabel Product Backlog, Sprint Backlog,
papan Sprint, Definition of Done, dan catatan Daily Scrum.

**3. Siapkan bahan baku:** aplikasi biodata hasil Latihan 1-3 (milik sendiri) dan daftar fitur
yang masih ingin Anda tambahkan.

**4. Siapkan alat bukti:** screenshot papan/backlog setiap kali ada perubahan status item —
inilah bukti Post Test 2.1.

---

## D. Soal Latihan (dikerjakan di kelas, 50 menit)

**Jumlah soal dipilih 10 langkah** — total alokasi tepat 50 menit.

**1. Tetapkan produk & peran (5 menit)**
Tulis satu paragraf: produk apa yang dikerjakan (aplikasi biodata Anda atau proyek kelompok),
siapa penggunanya, dan masalah apa yang diselesaikan. Lalu isi tabel peran:

| Peran | Nama | Alasan pemilihan |
|---|---|---|
| Product Owner | | |
| Scrum Master | | |
| Developer Team | | |

**2. Tulis Product Backlog minimal 8 item (12 menit)**
Susun tabel dengan kolom: **ID, User Story, Peran, Prioritas (P0/P1/P2), Estimasi (S/M/L)**.
Setiap baris **wajib** memakai format *"Sebagai … saya ingin … agar …"*.
Contoh lengkap ada di [`template-scrum.md`](template-scrum.md) bagian *Contoh terisi*.

**3. Perbaiki 3 user story yang buruk (5 menit)**
Ubah ketiga kalimat berikut menjadi user story yang benar (lengkap 3W), lalu tentukan prioritasnya:

| No | Kalimat buruk |
|---|---|
| a | "Buat halaman login" |
| b | "Bikin tampilan bagus" |
| c | "Tambah database" |

**4. Urutkan prioritas (5 menit)**
Urutkan seluruh backlog dari yang **paling bernilai** ke paling tidak. Jelaskan dalam 3-4 baris
mengapa item peringkat pertama Anda yang paling penting (hubungkan dengan pengguna, bukan selera pribadi).

**5. Pilih Sprint 1 (5 menit)**
Pilih **3-5 item** dari Product Backlog untuk Sprint 1 (minggu ini) — utamakan **P0**.
Salin ke tabel **Sprint Backlog** dan pecah setiap item menjadi langkah kerja konkret
(mis. user story *login* → `tabel user`, `controller Login`, `view form`, `uji hash`).

**6. Buat papan Sprint (8 menit)**
Pindahkan seluruh item Sprint Backlog ke papan `To Do | In Progress | Done` (Trello, GitLab Board,
atau tabel/spreadsheet). **Ambil screenshot** papan saat masih semua di `To Do`.

**7. Tetapkan Definition of Done (5 menit)**
Tulis DoD tim Anda, minimal 4 butir, yang **dapat diperiksa orang lain**. Contoh kerangka:
kode berjalan di CI4 tanpa error · input tervalidasi di sisi server · `esc()` dipakai pada output ·
diuji dengan data uji · sudah di-*commit* & *push* ke Git · dapat didemonstrasikan.

**8. Jadwalkan empat event (5 menit)**
Tulis jadwal nyata: Sprint Planning, **Daily Scrum** (jam & media, mis. grup chat pukul 20.00),
Sprint Review (tanggal kelas Pertemuan 5), dan Sprint Retrospective. Tulis juga **tiga hambatan
yang Anda antisipasi** beserta cara mengatasinya.

**9. Isi papan sampai ada 1 item di `In Progress` (5 menit)**
Mulai kerjakan **satu** item paling atas: pindahkan ke `In Progress`, tulis nama pelaksana dan
tanggal mulai. Buktikan dengan screenshot — Sprint 1 resmi berjalan.

**10. Susun daftar kumpul (langkah terakhir)**
Rapikan berkas `scrum-*.md` + screenshot papan, ekspor menjadi **PDF** sebagai bukti **Post Test 2.1**.

**11. Tugas mandiri — Tugas 3 (2 × 3 × 60 menit)**
Selesaikan **seluruh item Sprint 1** dan **minimal 2 item P0** hingga memenuhi Definition of Done.
Pilih fitur baru yang belum ada pada Latihan 1-3 (mis. pencarian data, ekspor CSV/PDF, atau dashboard),
kerjakan dalam beberapa *commit* Git yang jelas pesannya, lalu **presentasikan** dengan alur:
*item backlog → yang selesai minggu ini → demo Increment → umpan balik PO → rencana Sprint 2*.
Bawa papan Sprint Anda saat presentasi.

> Bantuan teknis (khususnya untuk item P1): fitur **pencarian** sudah tersedia acuannya pada
> `MahasiswaModel::cari()` di project ini.

---

## E. Yang Dikumpulkan

1. **Berkas SCRUM** (`scrum-*.md` atau PDF) berisi: produk & peran, Product Backlog ≥ 8 user story,
   hasil perbaikan 3 user story buruk, urutan prioritas, Sprint Backlog 3-5 item, papan Sprint,
   Definition of Done, jadwal 4 event + 3 hambatan.
2. **Screenshot** papan Sprint (kondisi `To Do` dan saat ≥ 1 item `In Progress`), sebagai bukti
   Post Test 2.1.
3. **Bukti Increment** (Pertemuan 5): aplikasi berjalan + tautan/riwayat *commit* Git + screenshot
   minimal 2 fitur baru yang memenuhi DoD.
4. **Jawaban** pertanyaan refleksi bagian I (boleh menyatu dengan laporan presentasi).

---

## F. Rambu-rambu Jawaban (untuk dosen)

| Bagian | Berkas acuan di project ini |
|---|---|
| Contoh Product Backlog & Sprint Backlog terisi | `docs/template-scrum.md` → bagian *Contoh terisi (aplikasi biodata)* |
| Bahan baku fitur (sudah dikerjakan mahasiswa) | `app/Config/Routes.php` blok LATIHAN 1-3, `app/Controllers/Mahasiswa.php` |
| Contoh item backlog P1 "Pencarian" | `app/Models/MahasiswaModel.php` → `cari()` |
| Contoh DoD teknis yang terukur | `docs/rubrik-penilaian.md` bagian 2 (kriteria keamanan dasar) |
| Referensi resmi | Schwaber & Sutherland (2020), *The Scrum Guide* — <https://scrumguides.org> |

Kesalahan umum dan cara menanganinya:

| Gejala | Penyebab | Solusi |
|---|---|---|
| Backlog berbunyi "buat halaman login" | Belum memakai format user story | Paksa 3W: Sebagai **siapa**, ingin **apa**, agar **apa** |
| Semua item berprioritas P0 | Tidak berani memilih prioritas | Batasi: maksimal 3-4 item P0; sisanya wajib P1/P2 |
| Sprint 1 berisi 8 item | Tidak realistis untuk 1 minggu | Maksimal 3-5 item; ingatkan kapasitas waktu nyata |
| Semua item berestimasi L | Item terlalu besar | Pecah item L menjadi beberapa S/M |
| Papan hanya di `To Do`, tidak pernah bergerak | Sprint tidak benar-benar dijalankan | Wajibkan bukti `In Progress` di soal 9 |
| DoD berbunyi "selesai/rapi" | DoD tidak dapat diverifikasi | Minta kriteria yang bisa diperiksa orang lain (mis. "tervalidasi", "ter-push") |
| Backlog tidak pernah diperbarui | Artefak dianggap tugas sekali jadi | Tunjukkan Product Backlog = **dokumen hidup**, boleh berubah antar-Sprint |

Poin kunci penilaian:

- **Peran dituliskan**, meski satu orang merangkap beberapa peran.
- **Setiap backlog item adalah user story**, bukan daftar tugas teknis ("buat controller").
- **Sprint Backlog tidak berubah** selama Sprint; perubahan permintaan masuk ke Product Backlog
  untuk Sprint berikutnya — ini pembeda utama SCRUM dari "kerja bebas".
- **Increment ≠ kode mentah.** Harus memenuhi DoD dan dapat didemonstrasikan.
- Fitur yang dinilai pada Tugas 3 sebaiknya **fitur baru** (bukan mengulang CRUD Latihan 2-3).

---

## G. Rubrik Penilaian (skor 0-4 per kriteria)

| Kriteria | Bobot | 4 (sangat baik) | 3 (baik) | 2 (cukup) | 1 (kurang) |
|---|---|---|---|---|---|
| Produk & peran | 10% | Produk & pengguna jelas, ketiga peran terisi dengan alasan | Peran terisi lengkap | Peran sebagian/asal isi | Tidak ada |
| Product Backlog | 25% | ≥ 8 user story format benar, INVEST terjaga, ada kolom prioritas & estimasi | ≥ 8 item, format sebagian besar benar | < 8 item atau banyak bukan user story | Tidak ada backlog |
| Prioritas & estimasi | 15% | P0/P1/P2 masuk akal, estimasi S/M/L wajar, ada alasan urutan | Sebagian besar wajar | Prioritas/estimasi asal | Tidak ada |
| Sprint Backlog (Sprint 1) | 15% | 3-5 item P0, dipecah menjadi langkah kerja konkret & realistis | 3-5 item terpilih | Item terpilih tetapi tidak dipecah | Tidak ada |
| Papan Sprint & ritme event | 15% | Papan tiga kolom aktif, bukti `In Progress`, jadwal 4 event + antisipasi hambatan | Papan dibuat, jadwal ada | Papan ada tanpa jadwal | Tidak ada |
| Definition of Done | 10% | ≥ 4 butir, dapat diverifikasi orang lain | Ada 2-3 butir jelas | DoD kabur | Tidak ada |
| Increment & presentasi | 10% | ≥ 2 item P0 memenuhi DoD, demo lancar, alasan teknis tepat | Increment jalan, presentasi cukup | Increment sebagian | Tidak ada Increment |

**Nilai akhir** = Σ (skor/4 × bobot) × 100.

---

## H. Tantangan (bonus)

1. **Backlog dua peran pengguna**: tambahkan user story untuk peran *operator akademik* (bukan hanya
   admin), lalu jelaskan bagaimana PO memutuskan prioritas antar-peran.
2. **Sprint 2 planning**: setelah Increment pertama, susun rencana Sprint 2 dan tunjukkan **perubahan**
   Product Backlog beserta alasannya (bukti backlog sebagai dokumen hidup).
3. **Burndown sederhana**: catat jumlah item selesai setiap hari selama Sprint 1, buat grafik
   sederhana, dan jelaskan apa artinya bila garisnya mendatar.
4. **Perbandingan metodologi**: tuliskan satu halaman perbandingan Waterfall vs SCRUM untuk proyek
   biodata ini, lalu simpulkan kapan Waterfall justru lebih tepat.
5. **Terapkan Scrum pada tim**: bagi peran ke anggota kelompok, jalankan Daily Scrum sungguhan
   (3 hari berturut-turut), dan lampirkan catatannya.

---

## I. Pertanyaan Refleksi

1. Apa perbedaan peran **Product Owner** dan **Scrum Master**? Mengapa SM disebut "bukan bos tim"?
2. Apa bedanya **Product Backlog** dan **Sprint Backlog**? Mengapa Sprint Backlog tidak boleh berubah
   di tengah Sprint?
3. Ubah kalimat "buat fitur pencarian" menjadi sebuah user story yang baik, lalu tentukan prioritas
   dan estimasinya. Jelaskan alasan Anda.
4. Mengapa **Increment** harus memenuhi Definition of Done dan dapat didemonstrasikan, bukan sekadar
   "kode sudah ditulis"?
5. Sebutkan satu kelemahan SCRUM yang Anda rasakan saat mengerjakan Sprint 1, dan bagaimana Anda
   mengatasinya.
6. Bandingkan pengalaman Anda mengerjakan Latihan 1-3 (tanpa rencana eksplisit) dengan Sprint 1
   (dengan backlog). Perbedaan nyata apa yang Anda rasakan?
