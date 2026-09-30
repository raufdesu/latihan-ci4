<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * UserModel — tabel `user` untuk autentikasi sederhana (materi Pertemuan 3).
 *
 * PERINGATAN KEAMANAN:
 * Kolom password TIDAK BOLEH menyimpan password asli (plain text).
 * Simpan hasil password_hash($password, PASSWORD_DEFAULT), lalu periksa
 * dengan password_verify($input, $hash) saat login.
 */
class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'nama_lengkap'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Mencari user berdasarkan username (username harus unik).
     *
     * @return array<string, mixed>|null
     */
    public function cariUsername(string $username): ?array
    {
        return $this->where('username', $username)->first();
    }
}
