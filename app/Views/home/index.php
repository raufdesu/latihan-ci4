<?= view('layout/header') ?>

<h1><?= esc($judul) ?></h1>
<p class="subjudul">Materi Pertemuan 1–4 · CodeIgniter 4 · paket latihan siap dikerjakan</p>

<div class="card">
    <h2 style="margin-top:0">Selamat datang 👋</h2>
    <p>
        Aplikasi ini adalah <strong>kunci/referensi</strong> untuk empat latihan praktikum.
        Setiap latihan berisi soal, langkah kerja, dan kode pembanding yang bisa Anda baca
        di folder <code>app/</code>. Silakan kerjakan sendiri dulu, baru bandingkan.
    </p>
    <p class="hint">
        Alur request yang dipakai aplikasi ini:
        <code>URL → Routes → Controller → Model → Database → View → HTML</code>
    </p>
</div>

<h2>Daftar Latihan</h2>

<?php foreach ($latihan as $l): ?>
    <div class="card">
        <h2 style="margin-top:0">Latihan <?= esc($l['nomor']) ?> — <?= esc($l['judul']) ?></h2>
        <p><?= esc($l['materi']) ?></p>
        <a class="btn" href="<?= esc($l['url']) ?>">Buka Latihan <?= esc($l['nomor']) ?></a>
    </div>
<?php endforeach; ?>

<div class="card">
    <h2 style="margin-top:0">Berkas penting yang perlu dibaca</h2>
    <table>
        <tr><th>Berkas</th><th>Fungsi</th></tr>
        <tr><td><code>app/Config/Routes.php</code></td><td>Peta URL → controller (routing)</td></tr>
        <tr><td><code>app/Controllers/</code></td><td>Controller: mengatur alur permintaan</td></tr>
        <tr><td><code>app/Models/</code></td><td>Model: berurusan dengan database</td></tr>
        <tr><td><code>app/Views/</code></td><td>View: tampilan HTML</td></tr>
        <tr><td><code>.env</code></td><td>Konfigurasi database, session, environment</td></tr>
        <tr><td><code>docs/</code></td><td>Soal latihan 1–4 (termasuk lembar kerja SCRUM), rubrik penilaian, dan skrip SQL</td></tr>
    </table>
</div>

<?= view('layout/footer') ?>
