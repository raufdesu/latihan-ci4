<?= view('layout/header') ?>

<h1><?= esc($judul) ?></h1>
<p class="subjudul"><?= esc($subjudul) ?></p>

<div class="toolbar">
    <a class="btn" href="<?= site_url('mahasiswa/tambah') ?>">+ Tambah Data</a>
    <span class="hint">Jumlah data: <strong><?= esc(count($mahasiswa)) ?></strong> baris</span>
</div>

<div class="card">
    <?php if (empty($mahasiswa)): ?>
        <p class="kosong">
            Belum ada data mahasiswa.<br>
            Klik <strong>+ Tambah Data</strong> untuk menambahkan, atau jalankan
            <code>php spark db:seed MahasiswaSeeder</code>.
        </p>
    <?php else: ?>
        <table>
            <tr>
                <th style="width:50px">No</th>
                <th style="width:110px">NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th style="width:150px">Aksi</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($mahasiswa as $m): ?>
                <tr>
                    <td><?= esc($no++) ?></td>
                    <td><?= esc($m['nim']) ?></td>
                    <td><?= esc($m['nama']) ?></td>
                    <td><?= esc($m['jurusan'] ?? '-') ?></td>
                    <td><?= esc($m['alamat'] ?? '-') ?></td>
                    <td>
                        <div class="aksi">
                            <a class="btn btn-kecil btn-secondary"
                               href="<?= site_url('mahasiswa/edit/' . $m['id']) ?>">Edit</a>

                            <?php // Hapus memakai POST + konfirmasi JS (lebih aman daripada link GET) ?>
                            <?= form_open('mahasiswa/hapus/' . $m['id'], [
                                'onsubmit' => "return confirm('Yakin hapus data ini?')",
                                'style'    => 'display:inline',
                            ]) ?>
                                <button type="submit" class="btn btn-kecil btn-merah">Hapus</button>
                            <?= form_close() ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

<div class="card">
    <h2 style="margin-top:0">Sudah paham alurnya?</h2>
    <p>
        Halaman ini adalah hasil tiga langkah: <code>Routes</code> → <code>Mahasiswa::index()</code>
        → <code>MahasiswaModel::findAll()</code> → <code>view('mahasiswa/index')</code>.
        Buka <code>app/Controllers/Mahasiswa.php</code> untuk melihat kodenya baris per baris.
    </p>
</div>

<?= view('layout/footer') ?>
