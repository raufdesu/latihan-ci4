<?php

namespace App\Database\Seeds;

use App\Models\MahasiswaModel;
use CodeIgniter\Database\Seeder;

/**
 * Data awal tabel `mahasiswa`.
 * Jalankan dengan: php spark db:seed MahasiswaSeeder
 *
 * Seeder dibuat "aman diulang": data yang NIM-nya sudah ada tidak dimasukkan lagi.
 */
class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $model = new MahasiswaModel();

        $data = [
            ['nim' => '2024A001', 'nama' => 'Ahmad Fauzi',   'alamat' => 'Mataram',      'jurusan' => 'Sistem & Teknologi Informasi'],
            ['nim' => '2024A002', 'nama' => 'Siti Aminah',   'alamat' => 'Lombok Barat', 'jurusan' => 'Sistem & Teknologi Informasi'],
            ['nim' => '2024A003', 'nama' => 'Budi Santoso',  'alamat' => 'Sumbawa',      'jurusan' => 'Teknik Informatika'],
            ['nim' => '2024A004', 'nama' => 'Dewi Lestari',  'alamat' => 'Bima',         'jurusan' => 'Sistem Informasi'],
        ];

        foreach ($data as $row) {
            $sudahAda = $model->where('nim', $row['nim'])->countAllResults() > 0;

            if (! $sudahAda) {
                $model->insert($row);
                echo "  + {$row['nim']} {$row['nama']}" . PHP_EOL;
            }
        }
    }
}
