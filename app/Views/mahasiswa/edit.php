<?= view('layout/header') ?>

<h1><?= esc($judul) ?></h1>
<p class="subjudul"><?= esc($subjudul) ?></p>

<div class="card">
    <?php // Action diarahkan ke route berparameter: /mahasiswa/update/{id} ?>
    <?= form_open('mahasiswa/update/' . $mhs['id']) ?>

        <label for="nim">NIM <span style="color:#b91c1c">*</span></label>
        <?php // old('nim', ...) -> pakai isian lama bila validasi gagal, kalau tidak pakai data dari database ?>
        <input type="text" id="nim" name="nim" value="<?= old('nim', $mhs['nim']) ?>" autofocus>

        <label for="nama">Nama Lengkap <span style="color:#b91c1c">*</span></label>
        <input type="text" id="nama" name="nama" value="<?= old('nama', $mhs['nama']) ?>">

        <label for="jurusan">Jurusan</label>
        <input type="text" id="jurusan" name="jurusan" value="<?= old('jurusan', $mhs['jurusan']) ?>">

        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat"><?= old('alamat', $mhs['alamat']) ?></textarea>

        <p class="hint">
            Data yang sedang diubah: <strong><?= esc($mhs['nama']) ?></strong>
            (ID <?= esc($mhs['id']) ?>, dibuat <?= esc($mhs['created_at'] ?? '-') ?>).
        </p>

        <p style="margin-top:18px">
            <button type="submit" class="btn">Simpan Perubahan</button>
            <a class="btn btn-secondary" href="<?= site_url('mahasiswa') ?>">Batal</a>
        </p>

    <?= form_close() ?>
</div>

<div class="card">
    <h2 style="margin-top:0">Catatan praktikum</h2>
    <ul>
        <li><code>find($id)</code> mengambil satu baris berdasarkan primary key; hasilnya <code>null</code> bila tidak ada.</li>
        <li>Controller menolak ID yang tidak ditemukan sebelum menampilkan form (lihat <code>Mahasiswa::edit()</code>).</li>
        <li>Validasi NIM saat update memakai <code>is_unique[mahasiswa.nim,id,{id}]</code> supaya NIM sendiri tidak dianggap duplikat.</li>
    </ul>
</div>

<?= view('layout/footer') ?>
