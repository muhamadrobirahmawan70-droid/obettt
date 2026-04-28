<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-white mb-0">Koleksi Buku</h3>
            <p class="text-secondary small">Total koleksi buku di <b>LibreSchool</b></p>
        </div>
        <a href="<?= base_url('buku/create') ?>" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Buku
        </a>
    </div>

    <div class="card bg-dark border-secondary border-opacity-25 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0 datatable">
                    <thead class="table-light text-dark">
                        <tr>
                            <th class="ps-4 py-3" width="60">No</th>
                            <th>Sampul</th>
                            <th>Informasi Buku</th>
                            <th>Kategori</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center" width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($buku)): ?>
                            <?php $no = 1; foreach ($buku as $b): ?>
                                <tr>
                                    <td class="ps-4 text-secondary"><?= $no++ ?></td>
                                    <td>
                                        <img src="<?= base_url('uploads/buku/' . ($b['cover'] ?: 'no_image.png')) ?>" 
                                             width="50" height="70" class="rounded shadow-sm object-fit-cover border border-secondary border-opacity-50">
                                    </td>
                                    <td>
                                        <div class="fw-bold text-white"><?= $b['judul'] ?></div>
                                        <small class="text-secondary"><?= $b['id_penulis'] ?> | <?= $b['penerbit'] ?></small>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary bg-opacity-25 text-info border border-info border-opacity-25">
                                            <?= $b['id_kategori'] ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($b['stok'] <= 0): ?>
                                            <span class="badge bg-danger">Habis</span>
                                        <?php else: ?>
                                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3">
                                                <?= $b['stok'] ?> eks
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group shadow-sm">
                                            <a href="<?= base_url('buku/edit/' . $b['id_buku']) ?>" class="btn btn-outline-warning btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="<?= base_url('buku/delete/' . $b['id_buku']) ?>" 
                                               onclick="return confirm('Hapus buku ini?')" class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center py-5 text-secondary">Belum ada koleksi buku.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>