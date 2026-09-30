<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

/**
 * Data awal tabel `user` untuk login sederhana.
 * Jalankan dengan: php spark db:seed UserSeeder
 *
 * Akun bawaan:  username: admin   password: admin123
 * Password disimpan sebagai hash (PASSWORD_DEFAULT = bcrypt),
 * jadi isi tabel tidak bisa dibaca langsung sebagai password asli.
 */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        $model = new UserModel();

        $daftar = [
            ['username' => 'admin',   'password' => 'admin123',   'nama_lengkap' => 'Administrator'],
            ['username' => 'operator', 'password' => 'operator123', 'nama_lengkap' => 'Operator Akademik'],
        ];

        foreach ($daftar as $user) {
            if ($model->cariUsername($user['username']) !== null) {
                continue;
            }

            $model->insert([
                'username'     => $user['username'],
                'password'     => password_hash($user['password'], PASSWORD_DEFAULT),
                'nama_lengkap' => $user['nama_lengkap'],
            ]);

            echo "  + user {$user['username']} (password: {$user['password']})" . PHP_EOL;
        }
    }
}
