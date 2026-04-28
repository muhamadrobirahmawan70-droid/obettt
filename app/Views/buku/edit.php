<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4 py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card bg-dark text-white border-secondary border-opacity-25 shadow-lg">
                <div class="card-header bg-transparent border-secondary border-opacity-25 py-3">
                    <h4 class="mb-0 d-flex align-items-center">
                        <i class="bi bi-pencil-square me-2 text-warning"></i> Edit Informasi Buku
                    </h4>
                </div>

                <div class="card-body p-4">
                    <form action="<?= base_url('buku/update/' . $buku['id_buku']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label text-secondary small fw-bold text-uppercase">Judul Buku</label>
                                    <input type="text" name="judul" value="<?= $buku['judul'] ?>" class="form-control bg-dark border-secondary text-white" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-secondary small fw-bold text-uppercase">Pengarang</label>
                                        <input type="text" name="id_penulis" value="<?= $buku['id_penulis'] ?>" class="form-control bg-dark border-secondary text-white" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-secondary small fw-bold text-uppercase">Penerbit</label>
                                        <input type="text" name="penerbit" value="<?= $buku['penerbit'] ?>" class="form-control bg-dark border-secondary text-white" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-secondary small fw-bold text-uppercase">Kategori</label>
                                        <select name="id_kategori" class="form-select bg-dark border-secondary text-white">
                                            <?php foreach ($kategori as $k): ?>
                                                <option value="<?= $k['id_kategori'] ?>" <?= $buku['id_kategori'] == $k['id_kategori'] ? 'selected' : '' ?>>
                                                    <?= $k['nama_kategori'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-secondary small fw-bold text-uppercase">Jumlah Stok</label>
                                        <input type="number" name="stok" value="<?= $buku['stok'] ?>" class="form-control bg-dark border-secondary text-white" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 text-center border-start border-secondary border-opacity-25">
                                <label class="form-label text-secondary small fw-bold text-uppercase d-block">Sampul Buku</label>
                                <div class="mb-3 mt-2">
                                    <img src="<?= base_url('uploads/buku/' . ($buku['cover'] ?: 'no_image.png')) ?>" 
                                         id="imgPreview"
                                         style="width: 150px; height: 210px; object-fit: cover;" 
                                         class="rounded shadow border border-2 border-secondary mb-3">
                                    
                                    <div class="px-3">
                                        <input type="file" name="cover" id="inputCover" class="form-control form-control-sm bg-dark border-secondary text-white">
                                        <small class="text-muted d-block mt-2" style="font-size: 0.7rem;">
                                            Biarkan kosong jika tidak ingin mengganti cover.
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4 border-secondary opacity-25">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="<?= base_url('buku') ?>" class="btn btn-outline-secondary px-4">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-warning px-5 shadow fw-bold">
                                <i class="bi bi-save me-1"></i> Update Data Buku
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control:focus, .form-select:focus {
        background-color: #2b2b2b;
        border-color: #ffc107; /* Warna kuning warning saat fokus */
        color: #fff;
        box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
    }
</style>

<script>
    // Script sederhana untuk preview gambar saat memilih file
    document.getElementById('inputCover').onchange = evt => {
        const [file] = document.getElementById('inputCover').files
        if (file) {
            document.getElementById('imgPreview').src = URL.createObjectURL(file)
        }
    }
</script>

<?= $this->endSection() ?>