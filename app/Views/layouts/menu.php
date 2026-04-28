
<ul class="nav flex-column mt-2">
    <li class="nav-item mb-4 px-3">
        <div class="d-flex align-items-center text-primary fs-5 fw-bold py-2">
            <i class="bi bi-yelp me-2"></i>
            <span>LibreSchool<span class="text-white">App</span></span>
        </div>
    </li>

    <li class="nav-item mb-4 text-center px-3">
        <div class="profile-badge p-3 rounded-3 bg-dark bg-opacity-50 border border-secondary border-opacity-25">
            <img src="<?= base_url('uploads/users/' . (session()->get('foto') ?: 'default.png')) ?>" 
                 style="width: 70px; height: 70px; object-fit: cover;" 
                 class="rounded-circle border border-2 border-primary shadow-sm mb-2" 
                 alt="Profile" />
            <div class="small text-white-50">Masuk sebagai:</div>
            <div class="fw-bold text-white small text-truncate"><?= session('nama'); ?></div>
            <span class="badge bg-primary mt-1" style="font-size: 0.7rem;"><?= strtoupper(session('role')); ?></span>
        </div>
    </li>

    <hr class="mx-3 border-secondary opacity-25">

    <li class="nav-item px-2">
        <a class="nav-link side-link <?= (uri_string() == '' || uri_string() == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('/') ?>">
            <i class="bi bi-house-door me-2"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item px-2">
        <?php if (session()->get('role') == 'admin') : ?>
        <a class="nav-link side-link <?= (uri_string() == 'users') ? 'active' : '' ?>" href="<?= base_url('/users') ?>">
            <i class="bi bi-people me-2"></i> <span>Manajemen Users</span>
        </a>
         <?php endif; ?> 
    </li>
<li class="nav-item px-2">
         <?php $idu = session('id_user'); ?>
    <a class="nav-link side-link <?= (uri_string() == 'buku') ? 'active' : '' ?>" href="<?= base_url('/buku') ?>">
        <i class="bi bi-book me-2"></i> <span>Katalog Buku</span>
         
    </a>
</li>

    <li class="nav-item px-2">
        <?php $idu = session('id_user'); ?>
        <a class="nav-link side-link <?= (strpos(uri_string(), 'users/edit') !== false) ? 'active' : '' ?>" href="<?= base_url('users/edit/' . $idu) ?>">
            <i class="bi bi-person-gear me-2"></i> <span>Pengaturan Akun</span>
            
        </a>
    </li>
    
    <li class="nav-item px-2">
        <?php if (session()->get('role') == 'admin') : ?>
    <a class="nav-link side-link <?= (uri_string() == 'peminjaman') ? 'active' : '' ?>" href="<?= base_url('/peminjaman') ?>">
        <i class="bi bi-arrow-left-right me-2"></i> <span>Transaksi Peminjaman</span>
         <?php endif; ?>
    </a>
</li>

    <li class="nav-item mt-auto px-3 py-4">
        <a href="<?= site_url('/logout') ?>" class="btn btn-outline-danger btn-sm w-100 d-flex align-items-center justify-content-center">
            <i class="bi bi-box-arrow-right me-2"></i> Keluar
        </a>
    </li>
</ul>

<style>
    /* Styling tambahan khusus untuk link sidebar */
    .side-link {
        color: #a0a0a0 !important;
        padding: 10px 15px;
        border-radius: 8px;
        transition: all 0.2s ease;
        margin-bottom: 5px;
    }

    .side-link:hover {
        background-color: rgba(13, 110, 253, 0.1);
        color: #0d6efd !important;
        transform: translateX(5px);
    }

    .side-link.active {
        background-color: #0d6efd !important;
        color: white !important;
        font-weight: 500;
        box-shadow: 0 4px 10px rgba(13, 110, 253, 0.2);
    }

    .side-link i {
        font-size: 1.1rem;
    }
</style>
