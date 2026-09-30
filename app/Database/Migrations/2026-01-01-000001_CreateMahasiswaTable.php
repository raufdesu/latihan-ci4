<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Membuat tabel `mahasiswa` (Pertemuan 2, slide "Membuat Tabel & Data Awal").
 * Jalankan dengan: php spark migrate
 */
class CreateMahasiswaTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nim' => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
                'null'       => false,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            // Kolom tambahan (tantangan Praktikum 2 langkah 7).
            'jurusan' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        // NIM harus unik -> mendukung validasi is_unique[mahasiswa.nim].
        $this->forge->addUniqueKey('nim');
        $this->forge->createTable('mahasiswa', true);
    }

    public function down(): void
    {
        $this->forge->dropTable('mahasiswa', true);
    }
}
