<?php

namespace App\Controllers;

/**
 * Latihan1 — Routing, Controller & View (materi Pertemuan 1).
 *
 * Tujuan latihan:
 *  1. Membuktikan bahwa satu URL = satu method controller (routing).
 *  2. Memahami pembagian tugas: Controller menyiapkan DATA, View menampilkan.
 *  3. Melihat perbedaan halaman statis (isi tetap) dan dinamis (isi dari data).
 */
class Latihan1 extends BaseController
{
    /**
     * Halaman "web statis vs web dinamis".
     * URL: /latihan1
     */
    public function index(): string
    {
        $data = [
            'judul'       => 'Latihan 1 — Routing, Controller & View',
            'subjudul'    => 'Web statis, web dinamis, dan peran MVC',
            'waktuServer' => date('d-m-Y H:i:s'),
            'perbandingan' => [
                ['aspek' => 'Isi halaman', 'statis' => 'Tetap, ditulis manual', 'dinamis' => 'Berubah sesuai data'],
                ['aspek' => 'Database', 'statis' => 'Tidak ada', 'dinamis' => 'Bisa ada (MySQL)'],
                ['aspek' => 'Contoh', 'statis' => 'Profil perusahaan', 'dinamis' => 'Sistem akademik'],
                ['aspek' => 'Cara membuat', 'statis' => 'HTML/CSS langsung', 'dinamis' => 'PHP + framework (CI4)'],
            ],
        ];

        return view('latihan1/index', $data);
    }

    /**
     * Halaman profil: contoh data dikirim controller ke view.
     * URL: /latihan1/profil
     */
    public function profil(): string
    {
        // Data "dummy" — nanti di Latihan 2 data seperti ini diambil dari database.
        $data = [
            'judul'    => 'Latihan 1 — Profil',
            'subjudul' => 'Data dikirim Controller, ditampilkan View',
            'profil'   => [
                'nim'    => '2024A001',
                'nama'   => 'Ahmad Fauzi',
                'prodi'  => 'S1 Sistem & Teknologi Informasi',
                'kampus' => 'Universitas Muhammadiyah Mataram',
                'alamat' => 'Mataram, NTB',
                'skill'  => ['PHP Dasar', 'HTML & CSS', 'MySQL', 'CodeIgniter 4'],
            ],
        ];

        return view('latihan1/profil', $data);
    }

    /**
     * Halaman dinamis: isi halaman berubah mengikuti waktu server.
     * URL: /latihan1/waktu
     */
    public function waktu(): string
    {
        $jam = (int) date('H');

        // Logika sederhana di controller -> hasilnya dikirim ke view.
        if ($jam < 11) {
            $sapaan = 'Selamat pagi';
        } elseif ($jam < 15) {
            $sapaan = 'Selamat siang';
        } elseif ($jam < 18) {
            $sapaan = 'Selamat sore';
        } else {
            $sapaan = 'Selamat malam';
        }

        $data = [
            'judul'    => 'Latihan 1 — Halaman Dinamis',
            'subjudul' => 'Isi halaman berubah mengikuti waktu server',
            'sapaan'   => $sapaan,
            'tanggal'  => date('d-m-Y'),
            'jam'      => date('H:i:s'),
            'zona'     => date_default_timezone_get(),
        ];

        return view('latihan1/waktu', $data);
    }

    /**
     * Perulangan data di view (tanpa database) — jembatan ke Latihan 2.
     * URL: /latihan1/daftar
     */
    public function daftar(): string
    {
        $data = [
            'judul'    => 'Latihan 1 — Daftar Data (Array)',
            'subjudul' => 'Perulangan data di View: foreach + esc()',
            'mahasiswa' => [
                ['nim' => '2024A001', 'nama' => 'Ahmad Fauzi', 'alamat' => 'Mataram'],
                ['nim' => '2024A002', 'nama' => 'Siti Aminah', 'alamat' => 'Lombok Barat'],
                ['nim' => '2024A003', 'nama' => 'Budi Santoso', 'alamat' => 'Sumbawa'],
            ],
        ];

        return view('latihan1/daftar', $data);
    }
}
