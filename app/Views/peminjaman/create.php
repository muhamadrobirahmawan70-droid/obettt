<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4 py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card bg-dark text-white border-secondary border-opacity-25 shadow-lg">
                <div class="card-header bg-transparent border-secondary border-opacity-25 py-3">
                    <h4 class="mb-0 text-primary fw-bold">
                        <i class="bi bi-journal-plus me-2"></i>Catat Peminjaman Baru
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form action="<?= base_url('peminjaman/store') ?>" method="post">
                        <?= csrf_field(); ?>

                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold text-uppercase">Nama Anggota (Peminjam)</label>
                            <select name="id_user" class="form-select bg-dark border-secondary text-white" required>
                                <option value="" disabled selected>-- Pilih Anggota --</option>
                                <?php foreach ($users as $u): ?>
                                    <option value="<?= $u['id_user'] ?>"><?= $u['nama'] ?> (<?= $u['username'] ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold text-uppercase">Buku yang Dipinjam</label>
                            <select name="id_buku" class="form-select bg-dark border-secondary text-white" required>
                                <option value="" disabled selected>-- Pilih Judul Buku --</option>
                               <?php foreach ($books as $b): ?>
                                    <option value="<?= $b['id_buku'] ?>">
                                        <?= $b['judul'] ?> — [Sisa Stok: <?= $b['stok'] ?>]
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-muted">Hanya buku dengan stok > 0 yang muncul.</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-secondary small fw-bold text-uppercase">Tanggal Pinjam</label>
                                <input type="date" name="tgl_pinjam" class="form-control bg-dark border-secondary text-white" 
                                       value="<?= date('Y-m-d') ?>" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label text-secondary small fw-bold text-uppercase">Batas Pengembalian</label>
                                <input type="date" name="tgl_kembali" class="form-control bg-dark border-secondary text-white" 
                                       value="<?= date('Y-m-d', strtotime('+7 days')) ?>" required>
                                <small class="text-info">Default: 7 hari dari hari ini.</small>
                            </div>
                        </div>

                        <hr class="my-4 border-secondary opacity-25">

                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('peminjaman') ?>" class="btn btn-outline-secondary px-4">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary px-5 shadow">
                                <i class="bi bi-check-circle me-1"></i> Simpan Transaksi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-select:focus, .form-control:focus {
        background-color: #2b2b2b;
        border-color: #0d6efd;
        color: #fff;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
</style>

<?= $this->endSection() ?>