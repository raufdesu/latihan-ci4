<?= view('layout/header') ?>

<h1><?= esc($judul) ?></h1>
<p class="subjudul"><?= esc($subjudul) ?></p>

<div class="card">
    <h2 style="margin-top:0"><?= esc($sapaan) ?>, pengunjung!</h2>
    <table>
        <tr><th style="width:30%">Hari &amp; tanggal</th><td><?= esc($tanggal) ?></td></tr>
        <tr><th>Jam server</th><td><strong><?= esc($jam) ?></strong></td></tr>
        <tr><th>Zona waktu</th><td><?= esc($zona) ?></td></tr>
    </table>
    <p class="hint">
        Sapaan (pagi/siang/sore/malam) dipilih oleh controller berdasarkan jam server.
        Inilah bedanya halaman dinamis: HTML yang dikirim ke browser berbeda-beda
        walaupun URL-nya sama.
    </p>
</div>

<div class="card">
    <h2 style="margin-top:0">Coba sendiri</h2>
    <ol>
        <li>Muat ulang halaman ini beberapa kali — jam dan detiknya berubah.</li>
        <li>Buka <code>app/Controllers/Latihan1.php</code>, ubah batas jamnya (mis. pagi &lt; 10).</li>
        <li>Simpan, lalu muat ulang halaman tanpa restart server.</li>
    </ol>
    <a class="btn btn-secondary" href="<?= site_url('latihan1') ?>">Kembali ke Latihan 1</a>
</div>

<?= view('layout/footer') ?>
