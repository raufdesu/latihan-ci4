<?php

namespace App\Controllers;

/**
 * Home — halaman utama yang menampilkan daftar latihan.
 * Berguna sebagai "peta" selama praktikum Pertemuan 1-4.
 */
class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'judul' => 'Praktikum Pemrograman Web Berbasis Framework',
            'latihan' => [
                [
                    'nomor'  => 1,
                    'judul'  => 'Routing, Controller & View',
                    'materi' => 'Pertemuan 1 — pengenalan CodeIgniter 4, struktur folder, alur request',
                    'url'    => site_url('latihan1'),
                ],
                [
                    'nomor'  => 2,
                    'judul'  => 'CRUD (1): Read & Create',
                    'materi' => 'Pertemuan 2 — model, koneksi database, tampil data & form tambah',
                    'url'    => site_url('mahasiswa'),
                ],
                [
                    'nomor'  => 3,
                    'judul'  => 'CRUD (2): Update, Delete, Validasi & Hak Akses',
                    'materi' => 'Pertemuan 3 — edit, hapus, validasi, flashdata, login sederhana',
                    'url'    => site_url('mahasiswa'),
                ],
                [
                    'nomor'  => 4,
                    'judul'  => 'SCRUM: Peran, Artefak & Papan Sprint',
                    'materi' => 'Pertemuan 4 — Product Backlog, Sprint Backlog, papan sprint, Definition of Done (Post Test 2.1)',
                    'url'    => site_url('scrum'),
                ],
            ],
        ];

        return view('home/index', $data);
    }
}
