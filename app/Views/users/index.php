<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-white mb-0">Manajemen Pengguna</h3>
            <p class="text-secondary small">Daftar seluruh akun yang terdaftar di sistem <b>LibreSchool</b></p>
        </div>
        <?php if (session()->get('role') == 'admin') : ?>
            <a href="<?= base_url('users/create') ?>" class="btn btn-primary shadow-sm">
                <i class="bi bi-person-plus-fill me-1"></i> Tambah User Baru
            </a>
        <?php endif; ?>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success bg-success bg-opacity-10 border-0 text-success d-flex align-items-center shadow-sm mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <div><?= session()->getFlashdata('success') ?></div>
        </div>
    <?php endif; ?>

    <div class="card bg-dark border-secondary border-opacity-25 shadow-sm">
        <div class="card-body p-0"> <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0 datatable" id="userTable" >
                    <thead class="table-light text-dark">
                        <tr>
                            <th class="ps-4 py-3" width="70">No</th>
                            <th>Profil</th>
                            <th>Username</th>
                            <th>Role</th>
                            <?php if (session()->get('role') == 'admin') : ?>
                                <th class="text-center" width="200">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($users)): ?>
                            <?php $no = 1; foreach ($users as $u): ?>
                                <tr>
                                    <td class="ps-4 fw-bold text-secondary"><?= $no++ ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <?php if ($u['foto']): ?>
                                                <img src="<?= base_url('uploads/users/' . $u['foto']) ?>" width="45" height="45" class="rounded-circle border border-2 border-secondary object-fit-cover me-3 shadow-sm">
                                            <?php else: ?>
                                                <div class="rounded-circle bg-secondary bg-opacity-25 d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 45px; height: 45px;">
                                                    <i class="bi bi-person text-secondary"></i>
                                                </div>
                                            <?php endif; ?>
                                            <div>
                                                <div class="fw-bold text-white"><?= $u['nama'] ?></div>
                                                <small class="text-secondary fw-light">ID: #USR-<?= $u['id_user'] ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-info"><?= $u['username'] ?></td>
                                    <td>
                                        <span class="badge <?= $u['role'] == 'admin' ? 'bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25' : 'bg-info bg-opacity-10 text-info border border-info border-opacity-25' ?> px-3 py-2">
                                            <i class="bi <?= $u['role'] == 'admin' ? 'bi-shield-lock' : 'bi-person' ?> me-1"></i>
                                            <?= strtoupper($u['role']) ?>
                                        </span>
                                    </td>
                                    <?php if (session()->get('role') == 'admin') : ?>
                                        <td class="text-center">
                                            <div class="btn-group shadow-sm">
                                                <a href="<?= base_url('users/edit/' . $u['id_user']) ?>" class="btn btn-outline-warning btn-sm px-3">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="<?= base_url('users/delete/' . $u['id_user']) ?>" 
                                                   onclick="return confirm('Hapus user ini permanent?')" 
                                                   class="btn btn-outline-danger btn-sm px-3">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 text-secondary">
                                    <i class="bi bi-people fs-1 d-block mb-2 opacity-25"></i>
                                    Belum ada data user yang terdaftar.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling hover agar baris tabel sedikit terang saat disentuh */
    .table-hover tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.03) !important;
        transition: background-color 0.2s ease;
    }
    
    .object-fit-cover {
        object-fit: cover;
    }

    /* Badge styling */
    .badge {
        font-weight: 600;
        letter-spacing: 0.5px;
    }
</style>

<?= $this->endSection() ?>