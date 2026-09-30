<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

/*
| -------------------------------------------------------------------
| DAFTAR ROUTE APLIKASI LATIHAN CI4
| -------------------------------------------------------------------
| Pola penulisan: $routes->get('url', 'Controller::method');
|   - get()  : halaman biasa (data dikirim lewat URL)
|   - post() : kiriman form (data dikirim lewat body request)
| Lihat seluruh daftar route dengan perintah:  php spark routes
|
| Route disusun berkelompok sesuai pertemuan, supaya mudah dipelajari.
*/

// ===================================================================
// HALAMAN UTAMA (daftar latihan)
// ===================================================================
$routes->get('/', 'Home::index');

// ===================================================================
// LATIHAN 1 — Routing, Controller & View            (Pertemuan 1)
// ===================================================================
$routes->group('latihan1', static function (RouteCollection $routes) {
    $routes->get('/', 'Latihan1::index');        // web statis vs web dinamis
    $routes->get('profil', 'Latihan1::profil');  // data dari controller -> view
    $routes->get('waktu', 'Latihan1::waktu');    // halaman dinamis (waktu server)
    $routes->get('daftar', 'Latihan1::daftar');  // perulangan data di view (tanpa DB)
});

// ===================================================================
// LATIHAN 2 — Read & Create                          (Pertemuan 2)
// ===================================================================
$routes->get('mahasiswa', 'Mahasiswa::index');          // R: tampil data
$routes->get('mahasiswa/tambah', 'Mahasiswa::tambah');  // C: form tambah
$routes->post('mahasiswa/simpan', 'Mahasiswa::simpan'); // C: proses simpan

// ===================================================================
// LATIHAN 3 — Update, Delete, Validasi & Hak Akses   (Pertemuan 3)
// ===================================================================
// Route berparameter (:num) -> nilainya dikirim ke method sebagai $1
$routes->get('mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');     // U: form edit
$routes->post('mahasiswa/update/(:num)', 'Mahasiswa::update/$1'); // U: proses update
$routes->post('mahasiswa/hapus/(:num)', 'Mahasiswa::hapus/$1');   // D: proses hapus

// Autentikasi sederhana (login/logout) — hak akses halaman kelola data
$routes->get('login', 'Login::index');          // form login
$routes->post('login/proses', 'Login::proses'); // proses cek username & password
$routes->get('logout', 'Login::logout');        // hapus session lalu kembali ke login

// ===================================================================
// LATIHAN 4 — SCRUM: Peran, Artefak & Papan Sprint    (Pertemuan 4)
// ===================================================================
// Halaman ini menampilkan Product Backlog, Sprint Backlog, papan sprint,
// Definition of Done, event SCRUM, serta Review & Retrospective.
// Semua data disiapkan di controller (app/Controllers/Scrum.php).
$routes->get('scrum', 'Scrum::index');          // lembar kerja SCRUM (Post Test 2.1)
