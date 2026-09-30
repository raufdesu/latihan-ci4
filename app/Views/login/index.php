<?= view('layout/header') ?>

<h1><?= esc($judul) ?></h1>
<p class="subjudul"><?= esc($subjudul) ?></p>

<div class="card" style="max-width:460px">
    <?= form_open('login/proses') ?>

        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?= old('username') ?>" autofocus>

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <p style="margin-top:18px">
            <button type="submit" class="btn">Masuk</button>
            <a class="btn btn-secondary" href="<?= site_url('/') ?>">Kembali</a>
        </p>

    <?= form_close() ?>
</div>

<div class="alert alert-info" style="max-width:460px">
    <strong>Akun untuk praktikum</strong><br>
    username: <code>admin</code> &nbsp;·&nbsp; password: <code>admin123</code><br>
    username: <code>operator</code> &nbsp;·&nbsp; password: <code>operator123</code><br>
    <span class="hint">Dibuat oleh <code>UserSeeder</code>. Password di database disimpan sebagai hash.</span>
</div>

<div class="card" style="max-width:460px">
    <h2 style="margin-top:0">Kenapa harus login?</h2>
    <p>
        Halaman kelola data (<code>/mahasiswa</code>) berisi aksi tambah, ubah, dan hapus.
        Tanpa login, siapa pun yang tahu URL-nya bisa merusak data. Karena itu setiap method
        di <code>Mahasiswa</code> memeriksa session <code>isLogin</code> lebih dulu —
        pengecekan dilakukan di server, bukan sekadar menyembunyikan tombol.
    </p>
</div>

<?= view('layout/footer') ?>
