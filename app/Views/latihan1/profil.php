<?= view('layout/header') ?>

<h1><?= esc($judul) ?></h1>
<p class="subjudul"><?= esc($subjudul) ?></p>

<div class="card">
    <table>
        <tr><th style="width:30%">NIM</th><td><?= esc($profil['nim']) ?></td></tr>
        <tr><th>Nama</th><td><?= esc($profil['nama']) ?></td></tr>
        <tr><th>Program Studi</th><td><?= esc($profil['prodi']) ?></td></tr>
        <tr><th>Kampus</th><td><?= esc($profil['kampus']) ?></td></tr>
        <tr><th>Alamat</th><td><?= esc($profil['alamat']) ?></td></tr>
        <tr>
            <th>Keahlian</th>
            <td>
                <ul style="margin:0 0 0 18px">
                    <?php foreach ($profil['skill'] as $s): ?>
                        <li><?= esc($s) ?></li>
                    <?php endforeach; ?>
                </ul>
            </td>
        </tr>
    </table>
</div>

<div class="card">
    <h2 style="margin-top:0">Yang perlu diperhatikan</h2>
    <ul>
        <li>Data <code>$profil</code> disiapkan di <code>Latihan1::profil()</code>, bukan ditulis di dalam view.</li>
        <li>View hanya menampilkan: tugasnya <em>menyajikan</em>, bukan mengolah data (prinsip “controller ramping”).</li>
        <li>Setiap nilai dibungkus <code>esc()</code> supaya aman dari XSS.</li>
    </ul>
    <a class="btn btn-secondary" href="<?= site_url('latihan1') ?>">Kembali ke Latihan 1</a>
</div>

<?= view('layout/footer') ?>
