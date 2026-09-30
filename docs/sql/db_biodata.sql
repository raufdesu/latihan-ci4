-- =====================================================================
--  SKRIP SQL MANUAL — APLIKASI BIODATA MAHASISWA (CI4)
--  Mata kuliah : Pemrograman Web Berbasis Framework (D1E3A01R)
--  Pertemuan   : 2-3
--
--  Cara pakai (cara manual, sesuai slide Pertemuan 2):
--    1. Buka http://localhost/phpmyadmin
--    2. Klik tab "SQL", tempel seluruh isi berkas ini, klik "Go".
--    3. Pastikan database db_biodata muncul beserta 2 tabel di dalamnya.
--
--  Cara otomatis (dipakai project ini):
--    php spark migrate
--    php spark db:seed MahasiswaSeeder
--    php spark db:seed UserSeeder
-- =====================================================================

CREATE DATABASE IF NOT EXISTS db_biodata
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;

USE db_biodata;

-- ---------------------------------------------------------------------
-- 1. Tabel mahasiswa  (Pertemuan 2 — Read & Create, Pertemuan 3 — Update & Delete)
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS mahasiswa;

CREATE TABLE mahasiswa (
    id         INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nim        VARCHAR(15)  NOT NULL,
    nama       VARCHAR(100) NOT NULL,
    alamat     TEXT         NULL,
    jurusan    VARCHAR(50)  NULL,
    created_at DATETIME     NULL,
    updated_at DATETIME     NULL,
    PRIMARY KEY (id),
    UNIQUE KEY uniq_nim (nim)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- Data awal (seed)
INSERT INTO mahasiswa (nim, nama, alamat, jurusan) VALUES
('2024A001', 'Ahmad Fauzi',  'Mataram',      'Sistem & Teknologi Informasi'),
('2024A002', 'Siti Aminah',  'Lombok Barat', 'Sistem & Teknologi Informasi'),
('2024A003', 'Budi Santoso', 'Sumbawa',      'Teknik Informatika'),
('2024A004', 'Dewi Lestari', 'Bima',         'Sistem Informasi');

-- ---------------------------------------------------------------------
-- 2. Tabel user  (Pertemuan 3 — login sederhana / hak akses)
--
--    PENTING: kolom password menyimpan HASH, bukan password asli.
--    Hash di bawah adalah contoh hasil password_hash('admin123', PASSWORD_DEFAULT).
--    Cara paling aman: biarkan baris INSERT ini, lalu jalankan
--        php spark db:seed UserSeeder
--    supaya hash dibuat ulang oleh PHP di komputer Anda.
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS user;

CREATE TABLE user (
    id           INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username     VARCHAR(50)  NOT NULL,
    password     VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100) NULL,
    created_at   DATETIME     NULL,
    updated_at   DATETIME     NULL,
    PRIMARY KEY (id),
    UNIQUE KEY uniq_username (username)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- Contoh hash dari password "admin123" (bcrypt):
-- $2y$10$mjgTfJ8044Zs6kFRnUl7JOsLWtKx9RfRUXFGuJGQsA8hD1uKTnTv6
INSERT INTO user (username, password, nama_lengkap) VALUES
('admin', '$2y$10$mjgTfJ8044Zs6kFRnUl7JOsLWtKx9RfRUXFGuJGQsA8hD1uKTnTv6', 'Administrator');

-- ---------------------------------------------------------------------
-- 3. Pemeriksaan hasil
-- ---------------------------------------------------------------------
SELECT * FROM mahasiswa;
SELECT id, username, nama_lengkap FROM user;
