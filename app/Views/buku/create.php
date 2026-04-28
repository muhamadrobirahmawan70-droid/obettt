<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4 py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card bg-dark text-white border-secondary border-opacity-25 shadow">
                <div class="card-header bg-transparent border-secondary border-opacity-25 py-3">
                    <h4 class="mb-0 text-primary fw-bold"><i class="bi bi-book-half me-2"></i>Tambah Koleksi Buku</h4>
                </div>
                <div class="card-body p-4">
                    <form action="<?= base_url('buku/store') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label text-secondary small fw-bold">JUDUL BUKU</label>
                                    <input type="text" name="judul" class="form-control bg-dark text-white border-secondary" required placeholder="Contoh: Laskar Pelangi">
                                </div>
                                <div class="row">
                                    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="mb-3">
    <label class="form-label">Penulis</label>
    <select name="id_penulis" class="form-control select-penulis card-glass">
        <option value="">-- Pilih Penulis --</option>
        <?php foreach ($penulis as $p) : ?>
            <option value="<?= $p['id_penulis'] ?>"><?= $p['nama_penulis'] ?></option>
        <?php endforeach; ?>
    </select>
</div>


                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-secondary small fw-bold">PENERBIT</label>
                                        <input type="text" name="penerbit" class="form-control bg-dark text-white border-secondary" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-secondary small fw-bold">KATEGORI</label>
                                        <select name="id_kategori" class="form-select bg-dark text-white border-secondary">
                                            <?php foreach ($kategori as $k): ?>
                                                <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-secondary small fw-bold">JUMLAH STOK</label>
                                        <input type="number" name="stok" class="form-control bg-dark text-white border-secondary" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center border-start border-secondary border-opacity-25">
                                <label class="form-label text-secondary small fw-bold d-block">COVER BUKU</label>
                                <div class="bg-secondary bg-opacity-10 rounded p-3 mb-3 border border-dashed border-secondary">
                                    <i class="bi bi-image text-secondary fs-1"></i>
                                </div>
                                <input type="file" name="cover" class="form-control form-control-sm bg-dark text-white border-secondary">
                                <small class="text-muted d-block mt-2">Maksimal 2MB (JPG/PNG)</small>
                            </div>
                        </div>

                        <hr class="my-4 border-secondary opacity-25">

                        <div class="d-flex justify-content-end gap-2">
                            <a href="<?= base_url('buku') ?>" class="btn btn-outline-secondary px-4">Batal</a>
                            <button type="submit" class="btn btn-primary px-5">Simpan Koleksi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select-penulis').select2({
            placeholder: "Cari Nama Penulis...",
            allowClear: true
        });
    });
</script>

<?= $this->endSection() ?>