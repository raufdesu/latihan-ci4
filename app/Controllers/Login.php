<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

/**
 * Login — autentikasi sederhana (materi Pertemuan 3, slide "Contoh Login Sederhana").
 *
 * Autentikasi = membuktikan identitas ("siapa kamu?") lewat username & password.
 * Otorisasi   = menentukan hak ("boleh akses apa?") lewat pengecekan session
 *               di setiap method controller yang dilindungi (lihat Mahasiswa::cekLogin()).
 */
class Login extends BaseController
{
    /**
     * Menampilkan form login.
     * URL: /login
     */
    public function index(): string|RedirectResponse
    {
        // Kalau sudah login, tidak perlu login lagi.
        if ($this->session->get('isLogin')) {
            return redirect()->to('mahasiswa');
        }

        return view('login/index', [
            'judul'    => 'Login',
            'subjudul' => 'Latihan 3 — autentikasi & hak akses halaman kelola data',
        ]);
    }

    /**
     * Memeriksa username & password.
     * URL: POST /login/proses
     */
    public function proses(): RedirectResponse
    {
        // 1) Validasi form dengan library Validation.
        if (! $this->validate(
            ['username' => 'required', 'password' => 'required'],
            [
                'username' => ['required' => 'Username wajib diisi.'],
                'password' => ['required' => 'Password wajib diisi.'],
            ]
        )) {
            return redirect()->back()->withInput()->with('validasi', $this->validator->getErrors());
        }

        $username = (string) $this->request->getPost('username');
        $password = (string) $this->request->getPost('password');

        // 2) Cari user di database.
        $model = new UserModel();
        $user  = $model->cariUsername($username);

        // 3) Cocokkan password input dengan hash di database.
        //    password_verify() -> SATU-SATUNYA cara mencocokkan password hash.
        if ($user === null || ! password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()
                ->with('gagal', 'Username atau password salah.');
        }

        // 4) Simpan status login di session (library Session).
        $this->session->set([
            'isLogin'      => true,
            'username'     => $user['username'],
            'nama_lengkap' => $user['nama_lengkap'],
        ]);

        return redirect()->to('mahasiswa')->with('pesan', 'Selamat datang, ' . $user['nama_lengkap'] . '!');
    }

    /**
     * Logout: hapus session lalu kembali ke halaman login.
     * URL: /logout
     *
     * Catatan: setelah session()->destroy(), session sudah dimusnahkan sehingga
     * flashdata tidak akan terbaca di halaman berikutnya. Karena itu halaman
     * login dibuat selalu menampilkan petunjuk "silakan login".
     * Bila ingin tetap menampilkan pesan, hapus datanya tanpa destroy():
     *     $this->session->remove(['isLogin', 'username', 'nama_lengkap']);
     */
    public function logout(): RedirectResponse
    {
        $this->session->destroy();

        return redirect()->to('login');
    }
}
