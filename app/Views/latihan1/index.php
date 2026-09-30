<?= view('layout/header') ?>

<h1><?= esc($judul) ?></h1>
<p class="subjudul"><?= esc($subjudul) ?></p>

<div class="card">
    <h2 style="margin-top:0">1. Bukti bahwa routing bekerja</h2>
    <p>
        Anda sedang membuka <code>/latihan1</code>. URL itu dicatat di
        <code>app/Config/Routes.php</code> sebagai
        <code>$routes-&gt;get('latihan1', 'Latihan1::index')</code>,
        sehingga method <code>index()</code> pada controller <code>Latihan1</code> yang dijalankan.
    </p>
    <p>
        Waktu server saat halaman ini dibuat:
        <strong><?= esc($waktuServer) ?></strong> —
        nilai ini <em>dihitung di controller</em>, bukan ditulis manual di HTML.
        Muat ulang halaman (F5) dan nilainya akan berubah.
    </p>
</div>

<div class="card">
    <h2 style="margin-top:0">2. Web statis vs web dinamis</h2>
    <table>
        <tr>
            <th>Aspek</th>
            <th>Web Statis</th>
            <th>Web Dinamis / Framework</th>
        </tr>
        <?php foreach ($perbandingan as $baris): ?>
            <tr>
                <td><strong><?= esc($baris['aspek']) ?></strong></td>
                <td><?= esc($baris['statis']) ?></td>
                <td><?= esc($baris['dinamis']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="card">
    <h2 style="margin-top:0">3. Tiga halaman contoh lain</h2>
    <ul>
        <li><a href="<?= site_url('latihan1/profil') ?>">/latihan1/profil</a> — data dikirim controller lalu ditampilkan view.</li>
        <li><a href="<?= site_url('latihan1/waktu') ?>">/latihan1/waktu</a> — halaman yang isinya berubah mengikuti waktu.</li>
        <li><a href="<?= site_url('latihan1/daftar') ?>">/latihan1/daftar</a> — perulangan data dengan <code>foreach</code> + <code>esc()</code>.</li>
    </ul>
    <p class="hint">Semua tautan di atas memakai helper <code>site_url()</code> agar tetap benar walau base URL berubah.</p>
</div>

<?= view('layout/footer') ?>
