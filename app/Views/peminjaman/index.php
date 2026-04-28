<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-white fw-bold">Transaksi Peminjaman</h3>
        <a href="<?= base_url('peminjaman/create') ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Pinjaman
        </a>
    </div>

    <div class="card bg-dark border-secondary border-opacity-25 shadow">
        <div class="card-body p-0">
            <table class="table table-dark table-hover mb-0 datatable">
                <thead class="table-light text-dark">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Status</th>
                        <th>Status</th>
                        <th>Denda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($pinjam as $p): ?>
                    <tr>
                        <td class="ps-4"><?= $no++ ?></td>
                        <td><?= $p['nama'] ?></td>
                        <td><i class="bi bi-book me-2"></i><?= $p['judul'] ?></td>
                        <td><?= date('d M Y', strtotime($p['tgl_pinjam'])) ?></td>
                        <td>
                            <span class="badge bg-<?= $p['status'] == 'dipinjam' ? 'warning' : 'success' ?> bg-opacity-10 text-<?= $p['status'] == 'dipinjam' ? 'warning' : 'success' ?> border border-<?= $p['status'] == 'dipinjam' ? 'warning' : 'success' ?> border-opacity-25">
                                <?= strtoupper($p['status']) ?>
                            </span>
                        </td>
                        <td class="text-center">
    <?php if ($p['status'] == 'dipinjam') : ?>
        <a href="<?= base_url('peminjaman/kembali/' . $p['id_pinjam']) ?>" 
           class="btn btn-outline-success btn-sm"
           onclick="return confirm('Konfirmasi pengembalian buku ini?')">
            <i class="bi bi-arrow-return-left me-1"></i> Kembalikan
        </a>
    <?php else : ?>
        <span class="text-muted small"><i class="bi bi-check-all"></i> Selesai</span>
    <?php endif; ?>
</td>
                <td>
    <?php if ($p['denda_sekarang'] > 0): ?>
        <span class="text-danger fw-bold">Rp <?= number_format($p['denda_sekarang'], 0, ',', '.') ?></span>
        <br><small class="text-warning">Terlambat!</small>
    <?php else: ?>
        <span class="text-success">Rp 0</span>
    <?php endif; ?>
</td>
                    </tr>
                    
                    
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>