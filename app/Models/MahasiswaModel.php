<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * MahasiswaModel — "gudang data" tabel `mahasiswa` (materi Pertemuan 2).
 *
 * Catatan penting:
 * - $table         : nama tabel di database MySQL.
 * - $primaryKey    : kolom kunci utama (dipakai find(), update(), delete()).
 * - $allowedFields : kolom yang BOLEH diisi dari form (mencegah mass assignment).
 * - $returnType    : 'array' -> hasil query berupa array, ditulis $mhs['nama'].
 *                    Ganti ke 'object' bila ingin $mhs->nama.
 */
class MahasiswaModel extends Model
{
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nim', 'nama', 'alamat', 'jurusan'];

    // Agar kolom created_at & updated_at terisi otomatis.
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Aturan validasi (opsional, dipakai bila memanggil $model->validate()).
     * Di praktikum, validasi ditulis di controller agar lebih terlihat alurnya.
     *
     * @var array<string, string>
     */
    protected $validationRules = [
        'nim'  => 'required|min_length[3]|max_length[15]',
        'nama' => 'required|min_length[3]|max_length[100]',
    ];

    /**
     * Pencarian sederhana berdasarkan NIM atau nama (bahan pengayaan).
     *
     * @return array<int, array<string, mixed>>
     */
    public function cari(string $keyword): array
    {
        return $this->like('nim', $keyword)
            ->orLike('nama', $keyword)
            ->orderBy('nama', 'ASC')
            ->findAll();
    }
}
