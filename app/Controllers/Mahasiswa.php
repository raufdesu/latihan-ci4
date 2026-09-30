<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\HTTP\RedirectResponse;

/**
 * Mahasiswa — controller CRUD aplikasi biodata.
 *
 * Isi file ini dipakai untuk dua latihan:
 *   LATIHAN 2 (Pertemuan 2) -> index()  (Read)
 *                              tambah() & simpan() (Create)
 *   LATIHAN 3 (Pertemuan 3) -> edit() & update() (Update)
 *                              hapus() (Delete)
 *                              validasi, flashdata, dan proteksi login
 *
 * Semua halaman di controller ini WAJIB login dulu (hak akses / otorisasi).
 * Cek login dilakukan di sisi server, bukan sekadar menyembunyikan tombol.
 */
class Mahasiswa extends BaseController
{
    /**
     * Memeriksa status login.
     *
     * @return RedirectResponse|null null bila sudah login (lanjutkan proses)
     */
    private function cekLogin(): ?RedirectResponse
    {
        if ($this->session->get('isLogin')) {
            return null;
        }

        $this->session->setFlashdata('gagal', 'Silakan login terlebih dahulu untuk mengelola data mahasiswa.');

        return redirect()->to('login');
    }

    /**
     * Aturan validasi form (dipakai saat simpan & update).
     *
     * @param int|null $id ID yang sedang diubah (agar NIM miliknya sendiri tidak dianggap dobel)
     *
     * @return array<string, string>
     */
    private function aturanValidasi(?int $id = null): array
    {
        // is_unique[table.kolom,kolom_kunci,nilai_yang_dikecualikan]
        $aturanUnik = $id === null
            ? 'is_unique[mahasiswa.nim]'
            : "is_unique[mahasiswa.nim,id,{$id}]";

        return [
            'nim'     => "required|min_length[3]|max_length[15]|{$aturanUnik}",
            'nama'    => 'required|min_length[3]|max_length[100]',
            'jurusan' => 'permit_empty|max_length[50]',
            'alamat'  => 'permit_empty',
        ];
    }

    /**
     * Pesan kesalahan validasi dalam bahasa Indonesia.
     *
     * @return array<string, array<string, string>>
     */
    private function pesanValidasi(): array
    {
        return [
            'nim' => [
                'required'   => 'NIM wajib diisi.',
                'min_length' => 'NIM minimal {param} karakter.',
                'max_length' => 'NIM maksimal {param} karakter.',
                'is_unique'  => 'NIM {value} sudah terdaftar, gunakan NIM lain.',
            ],
            'nama' => [
                'required'   => 'Nama wajib diisi.',
                'min_length' => 'Nama minimal {param} karakter.',
                'max_length' => 'Nama maksimal {param} karakter.',
            ],
            'jurusan' => [
                'max_length' => 'Jurusan maksimal {param} karakter.',
            ],
        ];
    }

    // =================================================================
    // LATIHAN 2 — READ (R): menampilkan data dari database
    // URL: /mahasiswa
    // =================================================================
    public function index(): string|RedirectResponse
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        $m = new MahasiswaModel();

        $data = [
            'judul'     => 'Data Mahasiswa',
            'subjudul'  => 'Latihan 2 (Read) — findAll() ditampilkan dengan foreach',
            'mahasiswa' => $m->orderBy('id', 'ASC')->findAll(),
        ];

        return view('mahasiswa/index', $data);
    }

    // =================================================================
    // LATIHAN 2 — CREATE (C): form tambah data
    // URL: /mahasiswa/tambah
    // =================================================================
    public function tambah(): string|RedirectResponse
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        $data = [
            'judul'    => 'Tambah Data Mahasiswa',
            'subjudul' => 'Latihan 2 (Create) — form POST ke /mahasiswa/simpan',
        ];

        return view('mahasiswa/tambah', $data);
    }

    /**
     * Proses simpan data baru.
     * URL: POST /mahasiswa/simpan
     */
    public function simpan(): RedirectResponse
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        // 1) Validasi input. Jangan pernah percaya input user!
        if (! $this->validate($this->aturanValidasi(), $this->pesanValidasi())) {
            // withInput() -> isian lama dipertahankan, dibaca dengan old('nim')
            return redirect()->back()->withInput()
                ->with('validasi', $this->validator->getErrors())
                ->with('gagal', 'Data gagal disimpan, periksa kembali isian Anda.');
        }

        // 2) Simpan lewat Model (hanya kolom di $allowedFields yang diambil).
        $m = new MahasiswaModel();
        $m->insert([
            'nim'     => $this->request->getPost('nim'),
            'nama'    => $this->request->getPost('nama'),
            'jurusan' => $this->request->getPost('jurusan'),
            'alamat'  => $this->request->getPost('alamat'),
        ]);

        // 3) Pola POST-redirect-GET + flashdata (pesan sekali tampil).
        return redirect()->to('mahasiswa')->with('pesan', 'Data mahasiswa berhasil disimpan.');
    }

    // =================================================================
    // LATIHAN 3 — UPDATE (U): form edit terisi data lama
    // URL: /mahasiswa/edit/(:num)
    // =================================================================
    public function edit(int $id): string|RedirectResponse
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        $m = new MahasiswaModel();
        $mhs = $m->find($id);

        // Cek dulu datanya ada; kalau tidak, kembali ke daftar.
        if (! $mhs) {
            return redirect()->to('mahasiswa')->with('gagal', "Data dengan ID {$id} tidak ditemukan.");
        }

        $data = [
            'judul'    => 'Edit Data Mahasiswa',
            'subjudul' => 'Latihan 3 (Update) — form terisi data lama',
            'mhs'      => $mhs,
        ];

        return view('mahasiswa/edit', $data);
    }

    /**
     * Proses update data.
     * URL: POST /mahasiswa/update/(:num)
     */
    public function update(int $id): RedirectResponse
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        $m = new MahasiswaModel();

        if (! $m->find($id)) {
            return redirect()->to('mahasiswa')->with('gagal', "Data dengan ID {$id} tidak ditemukan.");
        }

        if (! $this->validate($this->aturanValidasi($id), $this->pesanValidasi())) {
            return redirect()->back()->withInput()
                ->with('validasi', $this->validator->getErrors())
                ->with('gagal', 'Perubahan gagal disimpan, periksa kembali isian Anda.');
        }

        $m->update($id, [
            'nim'     => $this->request->getPost('nim'),
            'nama'    => $this->request->getPost('nama'),
            'jurusan' => $this->request->getPost('jurusan'),
            'alamat'  => $this->request->getPost('alamat'),
        ]);

        return redirect()->to('mahasiswa')->with('pesan', 'Data mahasiswa berhasil diperbarui.');
    }

    // =================================================================
    // LATIHAN 3 — DELETE (D): hapus satu baris data
    // URL: POST /mahasiswa/hapus/(:num)
    // =================================================================
    public function hapus(int $id): RedirectResponse
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        $m = new MahasiswaModel();

        if (! $m->find($id)) {
            return redirect()->to('mahasiswa')->with('gagal', "Data dengan ID {$id} tidak ditemukan.");
        }

        $m->delete($id);

        // Catatan: aksi hapus sebaiknya memakai POST (bukan link GET) supaya
        // tidak bisa dipicu hanya dengan membuka URL.
        return redirect()->to('mahasiswa')->with('pesan', 'Data mahasiswa berhasil dihapus.');
    }
}
