<?= view('layout/header') ?>

<h1><?= esc($judul) ?></h1>
<p class="subjudul"><?= esc($subjudul) ?></p>

<div class="card">
    <table>
        <tr>
            <th style="width:60px">No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($mahasiswa as $m): ?>
            <tr>
                <td><?= esc($no++) ?></td>
                <td><?= esc($m['nim']) ?></td>
                <td><?= esc($m['nama']) ?></td>
                <td><?= esc($m['alamat']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p class="hint">
        Data di halaman ini masih berupa <em>array</em> yang ditulis di controller.
        Di Latihan 2, array ini diganti hasil <code>findAll()</code> dari tabel
        <code>mahasiswa</code> — kode view-nya hampir sama.
    </p>
</div>

<div class="card">
    <h2 style="margin-top:0">Perhatikan tiga hal ini</h2>
    <ol>
        <li><strong>foreach</strong> — satu baris HTML dipakai untuk semua data.</li>
        <li><strong>esc()</strong> — setiap nilai dibersihkan sebelum ditampilkan (anti XSS).</li>
        <li><strong>Pemisahan tugas</strong> — controller menyiapkan data, view menampilkan.</li>
    </ol>
    <a class="btn btn-secondary" href="<?= site_url('latihan1') ?>">Kembali ke Latihan 1</a>
    <a class="btn" href="<?= site_url('mahasiswa') ?>">Lanjut ke Latihan 2</a>
</div>

<?= view('layout/footer') ?>
