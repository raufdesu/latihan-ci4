<?php

namespace App\Controllers;

/**
 * Scrum — halaman praktikum SCRUM (materi Pertemuan 4).
 *
 * Halaman ini adalah "dokumen hidup" versi aplikasi:
 *   - Product Backlog  : semua kebutuhan produk, diurutkan prioritas
 *   - Sprint Backlog   : item yang dipilih untuk Sprint berjalan
 *   - Papan Sprint     : To Do | In Progress | Done
 *   - Definition of Done, Sprint Review, dan Sprint Retrospective
 *
 * TUGAS MAHASISWA (Latihan 4):
 *   Data di bawah ini adalah CONTOH untuk aplikasi biodata.
 *   Ganti isinya dengan backlog proyek Anda sendiri, lalu buka /scrum
 *   untuk melihat hasilnya — sekaligus bukti Post Test 2.1.
 *
 * Catatan: seluruh data disiapkan di controller (controller menyiapkan data,
 * view hanya menampilkan) — pola yang sama seperti Latihan 1-3.
 */
class Scrum extends BaseController
{
    public function index(): string
    {
        // -----------------------------------------------------------------
        // 1. PRODUCT BACKLOG — daftar SEMUA kebutuhan, ditulis sebagai user story
        //    Format: Sebagai <peran>, saya ingin <fitur>, agar <manfaat>
        //    Prioritas: P0 wajib · P1 penting · P2 nice-to-have
        //    Estimasi : S (<= 1 hari) · M (2-3 hari) · L (seminggu+ -> pecah lagi)
        // -----------------------------------------------------------------
        $backlog = [
            [
                'id' => 'PB-01', 'prioritas' => 'P0', 'estimasi' => 'M', 'sprint' => 1, 'status' => 'Done',
                'cerita' => 'Sebagai admin, saya ingin login dengan username & password, agar data mahasiswa tidak bisa diubah sembarangan.',
                'bukti' => 'Login::proses() — password_verify + session isLogin',
            ],
            [
                'id' => 'PB-02', 'prioritas' => 'P0', 'estimasi' => 'S', 'sprint' => 1, 'status' => 'Done',
                'cerita' => 'Sebagai admin, saya ingin keluar (logout), agar sesi saya tidak dipakai orang lain.',
                'bukti' => 'Login::logout() — session()->destroy()',
            ],
            [
                'id' => 'PB-03', 'prioritas' => 'P0', 'estimasi' => 'S', 'sprint' => 1, 'status' => 'Done',
                'cerita' => 'Sebagai admin, saya ingin melihat daftar seluruh mahasiswa, agar data mudah diperiksa.',
                'bukti' => 'Mahasiswa::index() — findAll() + esc()',
            ],
            [
                'id' => 'PB-04', 'prioritas' => 'P0', 'estimasi' => 'M', 'sprint' => 1, 'status' => 'Done',
                'cerita' => 'Sebagai admin, saya ingin menambah data mahasiswa lewat form, agar data baru tercatat di database.',
                'bukti' => 'Mahasiswa::tambah() & simpan() — insert + redirect',
            ],
            [
                'id' => 'PB-05', 'prioritas' => 'P0', 'estimasi' => 'M', 'sprint' => 1, 'status' => 'Done',
                'cerita' => 'Sebagai admin, saya ingin mengubah data mahasiswa, agar kekeliruan isian bisa diperbaiki.',
                'bukti' => 'Mahasiswa::edit() & update() — find($id) + update()',
            ],
            [
                'id' => 'PB-06', 'prioritas' => 'P0', 'estimasi' => 'S', 'sprint' => 1, 'status' => 'Done',
                'cerita' => 'Sebagai admin, saya ingin menghapus data dengan konfirmasi, agar data tidak terhapus karena salah klik.',
                'bukti' => 'Mahasiswa::hapus() — POST + confirm()',
            ],
            [
                'id' => 'PB-07', 'prioritas' => 'P1', 'estimasi' => 'S', 'sprint' => 1, 'status' => 'Done',
                'cerita' => 'Sebagai admin, saya ingin NIM divalidasi wajib & unik, agar tidak ada data ganda.',
                'bukti' => 'Mahasiswa::aturanValidasi() — is_unique[mahasiswa.nim]',
            ],
            [
                'id' => 'PB-08', 'prioritas' => 'P1', 'estimasi' => 'M', 'sprint' => 2, 'status' => 'To Do',
                'cerita' => 'Sebagai admin, saya ingin mencari mahasiswa berdasarkan NIM atau nama, agar pencarian data cepat.',
                'bukti' => 'rencana: MahasiswaModel::cari() + form pencarian',
            ],
            [
                'id' => 'PB-09', 'prioritas' => 'P1', 'estimasi' => 'M', 'sprint' => 2, 'status' => 'To Do',
                'cerita' => 'Sebagai admin, saya ingin melihat jumlah mahasiswa per jurusan, agar tahu sebaran data.',
                'bukti' => 'rencana: dashboard ringkasan (GROUP BY jurusan)',
            ],
            [
                'id' => 'PB-10', 'prioritas' => 'P1', 'estimasi' => 'L', 'sprint' => null, 'status' => 'To Do',
                'cerita' => 'Sebagai admin, saya ingin mencetak laporan biodata ke PDF, agar bisa diarsipkan.',
                'bukti' => 'rencana: pecah menjadi PB-10a (tampilan cetak) & PB-10b (unduh PDF)',
            ],
            [
                'id' => 'PB-11', 'prioritas' => 'P2', 'estimasi' => 'M', 'sprint' => null, 'status' => 'To Do',
                'cerita' => 'Sebagai mahasiswa, saya ingin melihat biodata saya sendiri, agar tahu data yang tersimpan benar.',
                'bukti' => 'rencana: halaman profil mahasiswa + otorisasi per pemilik data',
            ],
            [
                'id' => 'PB-12', 'prioritas' => 'P2', 'estimasi' => 'M', 'sprint' => null, 'status' => 'To Do',
                'cerita' => 'Sebagai admin, saya ingin mengunggah foto mahasiswa, agar identitas lebih jelas.',
                'bukti' => 'rencana: library Upload + validasi tipe berkas',
            ],
        ];

        $sprint = [
            'nama'    => 'Sprint 1',
            'periode' => 'Minggu ke-4 (1 minggu sesuai kesepakatan kelas)',
            'tujuan'  => 'Aplikasi biodata dapat dikelola penuh oleh admin yang sudah login (login + CRUD + validasi dasar).',
        ];

        // -----------------------------------------------------------------
        // 2. PAPAN SPRINT (To Do | In Progress | Done)
        // -----------------------------------------------------------------
        $papan = [
            'todo' => [
                ['id' => 'PB-08', 'teks' => 'Pencarian mahasiswa (NIM/nama)'],
            ],
            'progress' => [],
            'done' => [
                ['id' => 'PB-01', 'teks' => 'Login admin'],
                ['id' => 'PB-02', 'teks' => 'Logout'],
                ['id' => 'PB-03', 'teks' => 'Daftar mahasiswa'],
                ['id' => 'PB-04', 'teks' => 'Tambah data'],
                ['id' => 'PB-05', 'teks' => 'Ubah data'],
                ['id' => 'PB-06', 'teks' => 'Hapus data + konfirmasi'],
                ['id' => 'PB-07', 'teks' => 'Validasi NIM unik'],
            ],
        ];

        // -----------------------------------------------------------------
        // 3. DEFINITION OF DONE (DoD) — kesepakatan tim
        // -----------------------------------------------------------------
        $dod = [
            'Fitur berjalan di CodeIgniter 4 tanpa error (diuji di browser).',
            'Input pengguna divalidasi di sisi server; pesan kesalahan jelas dan isian tidak hilang.',
            'Semua output data dibungkus esc() (aman dari XSS).',
            'Setiap aksi CRUD memberi umpan balik sukses/gagal (flashdata).',
            'Sudah diuji memakai daftar periksa dan buktinya (screenshot) tersimpan.',
            'Kode ter-push ke Git dengan pesan commit yang jelas.',
            'Dapat didemonstrasikan di Sprint Review (bukan sekadar "kode sudah ditulis").',
        ];

        // -----------------------------------------------------------------
        // 4. PERAN TIM (di proyek kuliah satu orang boleh merangkap)
        // -----------------------------------------------------------------
        $peran = [
            ['peran' => 'Product Owner', 'tugas' => 'Menyusun & mengurutkan Product Backlog, memutuskan prioritas dan kapan fitur dianggap cukup.', 'anggota' => 'Ketua kelompok / dosen sebagai pemilik produk'],
            ['peran' => 'Scrum Master', 'tugas' => 'Menjaga ritme event SCRUM, menghilangkan hambatan, memfasilitasi retrospektif (bukan bos tim).', 'anggota' => 'Anggota 2'],
            ['peran' => 'Developer Team', 'tugas' => 'Memecah item menjadi tugas teknis, membangun Increment, menguji, dan mendemokan hasil.', 'anggota' => 'Anggota 3-5 (3-9 orang)'],
        ];

        // -----------------------------------------------------------------
        // 5. AGENDA EVENT SCRUM (versi kuliah, Sprint = 1 minggu)
        // -----------------------------------------------------------------
        $event = [
            ['event' => 'Sprint Planning', 'waktu' => 'Awal minggu (setelah kelas)', 'keluaran' => 'Tujuan Sprint + Sprint Backlog + penanggung jawab tiap item'],
            ['event' => 'Daily Scrum', 'waktu' => 'Setiap hari, maks 15 menit', 'keluaran' => 'Kemarin apa · hari ini apa · hambatan apa (sinkronisasi, bukan laporan ke atasan)'],
            ['event' => 'Sprint Review', 'waktu' => 'Akhir minggu / saat kelas', 'keluaran' => 'Demo Increment ke PO, kumpulkan umpan balik, perbarui backlog'],
            ['event' => 'Sprint Retrospective', 'waktu' => 'Setelah Review (± 20 menit)', 'keluaran' => 'Perbaikan cara kerja tim: Start / Stop / Continue'],
        ];

        // -----------------------------------------------------------------
        // 6. CATATAN REVIEW & RETROSPEKTIF SPRINT 1 (contoh terisi)
        // -----------------------------------------------------------------
        $catatan = [
            'review' => [
                'Demo: login → tambah → ubah → hapus → logout berjalan. Password tersimpan sebagai hash.',
                'Umpan balik PO: tampilan sudah rapi; perlu pencarian dan ringkasan jumlah per jurusan.',
                'Keputusan: PB-09 dinaikkan ke Sprint 2 bersama PB-08.',
            ],
            'retro' => [
                'start'    => ['Menulis kriteria penerimaan sebelum coding', 'Commit Git harian dengan pesan jelas'],
                'stop'     => ['Mengerjakan dua fitur sekaligus', 'Menunda pengujian sampai akhir sprint'],
                'continue' => ['Daily Scrum 10 menit tiap hari', 'Daftar periksa DoD dijalankan sebelum demo'],
            ],
        ];

        // -----------------------------------------------------------------
        // 7. RINGKASAN PROGRES (dihitung dari data backlog)
        // -----------------------------------------------------------------
        $total     = count($backlog);
        $selesai   = count(array_filter($backlog, static fn (array $i): bool => $i['status'] === 'Done'));
        $sprintKe1 = array_values(array_filter($backlog, static fn (array $i): bool => $i['sprint'] === 1));

        $data = [
            'judul'    => 'Latihan 4 — SCRUM: Konsep, Peran & Artefak',
            'subjudul' => 'Post Test 2.1 — menyusun list pengerjaan web dengan SCRUM (Sprint 1 minggu)',
            'backlog'  => $backlog,
            'sprint'   => $sprint,
            'sprintKe1' => $sprintKe1,
            'papan'    => $papan,
            'dod'      => $dod,
            'peran'    => $peran,
            'event'    => $event,
            'catatan'  => $catatan,
            'ringkasan' => [
                'total'    => $total,
                'selesai'  => $selesai,
                'progress' => $total > 0 ? (int) round($selesai / $total * 100) : 0,
                'p0'       => count(array_filter($backlog, static fn (array $i): bool => $i['prioritas'] === 'P0')),
                'p1'       => count(array_filter($backlog, static fn (array $i): bool => $i['prioritas'] === 'P1')),
                'p2'       => count(array_filter($backlog, static fn (array $i): bool => $i['prioritas'] === 'P2')),
            ],
        ];

        return view('scrum/index', $data);
    }
}
