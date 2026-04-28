<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4 py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card bg-dark text-white border-secondary border-opacity-25 shadow-lg">
                <div class="card-header bg-transparent border-secondary border-opacity-25 py-3">
                    <h4 class="mb-0 d-flex align-items-center">
                        <i class="bi bi-person-gear me-2 text-primary"></i> Edit Profil Pengguna
                    </h4>
                </div>

                <div class="card-body p-4">
                    <form action="<?= base_url('users/update/' . $user['id_user']) ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label text-secondary small fw-bold text-uppercase">Nama Lengkap</label>
                                    <input type="text" name="nama" value="<?= $user['nama'] ?>" class="form-control bg-dark border-secondary text-white" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-secondary small fw-bold text-uppercase">Username</label>
                                    <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control bg-dark border-secondary text-white" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-secondary small fw-bold text-uppercase">Password</label>
                                    <input type="password" name="password" class="form-control bg-dark border-secondary text-white" placeholder="Biarkan kosong jika tidak ingin diubah">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-secondary small fw-bold text-uppercase">Role / Hak Akses</label>
                                    <select name="role" class="form-select bg-dark border-secondary text-white">
                                        <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                        <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 text-center border-start border-secondary border-opacity-25">
                                <label class="form-label text-secondary small fw-bold text-uppercase d-block">Foto Profil</label>
                                <div class="mb-3 mt-2">
                                    <?php if ($user['foto']): ?>
                                        <img src="<?= base_url('uploads/users/' . $user['foto']) ?>" width="120" height="120" class="rounded-circle shadow border border-3 border-primary object-fit-cover mb-3">
                                    <?php else: ?>
                                        <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 120px; height: 120px;">
                                            <i class="bi bi-person fs-1"></i>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <input type="file" name="foto" id="fotoInput" class="form-control form-control-sm bg-dark border-secondary text-white mt-2">
                                    <div class="form-text text-muted" style="font-size: 0.75rem;">Format: JPG, PNG (Max. 2MB)</div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4 border-secondary opacity-25">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="<?= base_url('users') ?>" class="btn btn-outline-secondary px-4">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary px-5 shadow">
                                <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling agar input form terlihat serasi di mode gelap */
    .form-control:focus, .form-select:focus {
        background-color: #2b2b2b;
        border-color: #0d6efd;
        color: #1f1b1b;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    .object-fit-cover {
        object-fit: cover;
    }
</style>

<?= $this->endSection() ?>