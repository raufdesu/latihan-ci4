<?= view('layout/header') ?>

<h1><?= esc($judul) ?></h1>
<p class="subjudul"><?= esc($subjudul) ?></p>

<div class="card">
    <?= form_open('mahasiswa/simpan') ?>

        <label for="nim">NIM <span style="color:#b91c1c">*</span></label>
        <input type="text" id="nim" name="nim" value="<?= old('nim') ?>" placeholder="contoh: 2024A005" autofocus>
        <p class="hint">Wajib diisi, minimal 3 karakter, dan tidak boleh sama dengan NIM yang sudah ada.</p>

        <label for="nama">Nama Lengkap <span style="color:#b91c1c">*</span></label>
        <input type="text" id="nama" name="nama" value="<?= old('nama') ?>" placeholder="contoh: Ahmad Fauzi">

        <label for="jurusan">Jurusan</label>
        <input type="text" id="jurusan" name="jurusan" value="<?= old('jurusan') ?>" placeholder="contoh: Sistem & Teknologi Informasi">

        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat" placeholder="contoh: Mataram, NTB"><?= old('alamat') ?></textarea>

        <p style="margin-top:18px">
            <button type="submit" class="btn">Simpan</button>
            <a class="btn btn-secondary" href="<?= site_url('mahasiswa') ?>">Batal</a>
        </p>

    <?= form_close() ?>
</div>

<div class="card">
    <h2 style="margin-top:0">Catatan praktikum</h2>
    <ul>
        <li><code>form_open('mahasiswa/simpan')</code> otomatis membuat <code>&lt;form method="post"&gt;</code> — helper <code>form</code>.</li>
        <li><code>old('nim')</code> mengembalikan isian sebelumnya bila validasi gagal (<code>withInput()</code> di controller).</li>
        <li>Setelah tersimpan, controller melakukan <strong>redirect</strong> ke daftar data (pola POST-redirect-GET).</li>
    </ul>
</div>

<?= view('layout/footer') ?>
