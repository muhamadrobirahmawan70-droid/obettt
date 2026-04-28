<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 min-vh-100 bg-dark text-light">
    
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mt-4 fw-bold">Dashboard</h1>
            <p class="text-secondary">Selamat datang kembali di <span class="text-info fw-semibold">LibreSchool</span> App!</p>
        </div>
        <div class="text-end d-none d-md-block">
            <span class="badge bg-secondary opacity-50 p-2"><?= date('l, d M Y') ?></span>
        </div>
    </div>

    <hr class="border-secondary opacity-25 mb-4">

    <div class="row g-4"> <div class="col-xl-4 col-md-6">
            <div class="card bg-dark border-secondary border-opacity-50 text-white shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase text-secondary small fw-bold">Total Koleksi Buku</h6>
                            <h2 class="mb-0 fw-bold counter" data-target="120">3</h2>
                        </div>
                        <div class="bg-primary bg-gradient p-3 rounded-3 shadow-sm">
                            <i class="bi bi-book fs-3"></i>
                        </div>
                    </div>
                </div>
                <div class="card card-glass ...">
    ...
    
    <a href="<?= base_url('buku') ?>" class="text-primary text-decoration-none small fw-bold">
        <span>Lihat Katalog</span> <i class="bi bi-arrow-right"></i>
    </a>
</div>

            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card bg-dark border-secondary border-opacity-50 text-white shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase text-secondary small fw-bold">Peminjaman Aktif</h6>
                            <h2 class="mb-0 fw-bold text-success">0</h2>
                        </div>
                        <div class="bg-success bg-gradient p-3 rounded-3 shadow-sm">
                            <i class="bi bi-arrow-repeat fs-3"></i>
                        </div>
                    </div>
                </div>
                <div class="card card-glass ...">
    ...
    <a href="<?= base_url('peminjaman') ?>" class="text-success text-decoration-none small fw-bold">
       <span>Cek Transaksi</span><i class="bi bi-arrow-right"></i>
    </a>
</div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card bg-dark border-secondary border-opacity-50 text-white shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase text-secondary small fw-bold">Total Anggota</h6>
                            <h2 class="mb-0 fw-bold text-warning">2</h2>
                        </div>
                        <div class="bg-warning bg-gradient p-3 rounded-3 shadow-sm text-dark">
                            <i class="bi bi-people fs-3"></i>
                        </div>
                    </div>
                </div>
                <div class="card card-glass ...">
    ...
    <a href="<?= base_url('users') ?>" class="text-warning text-decoration-none small fw-bold">
        <span>Manajemen User</span> <i class="bi bi-arrow-right"></i>
    </a>
</div>
            </div>
        </div>
    </div>

    <div class="mt-5 pt-2">
        <div class="alert bg-dark border-info border-opacity-50 text-light d-flex align-items-center shadow-sm" role="alert">
            <i class="bi bi-info-circle-fill text-info fs-4 me-3"></i>
            <div>
                <strong class="text-info">Info Sistem:</strong> Halo Admin! Harap pastikan stok buku diperbarui secara berkala untuk menjaga akurasi data peminjaman.
            </div>
        </div>
    </div>
</div>
<style>
    /* Efek buat link di dalam card */
.card-glass a {
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
}

/* Pas di-hover, teks agak terang dan ikon geser */
.card-glass a:hover {
    color: #fff !important; /* Biar lebih kontras pas di-hover */
}

.card-glass a i {
    transition: transform 0.3s ease;
    margin-left: 5px;
}

.card-glass a:hover i {
    transform: translateX(8px); /* Ikon panah geser ke kanan 8 pixel */
}
    /* Glassmorphism Effect */
    .card-glass {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 20px;
        transition: transform 0.3s ease, border-color 0.3s ease;
    }
    
    .card-glass:hover {
        transform: translateY(-8px);
        border-color: rgba(13, 110, 253, 0.5);
        background: rgba(255, 255, 255, 0.05);
    }

    .icon-shape {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn {
        border-radius: 12px;
        font-weight: 500;
    }
</style>
<script>
    // Fungsi buat animasiin angka
    const counters = document.querySelectorAll('.fw-bold.mb-0'); // Targetin angka besar
    
    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.innerText;
            const count = +counter.getAttribute('data-current') || 0;
            const speed = 200; // Makin besar makin lambat

            const inc = target / speed;

            if (count < target) {
                counter.setAttribute('data-current', count + inc);
                counter.innerText = Math.ceil(count + inc);
                setTimeout(updateCount, 1);
            } else {
                counter.innerText = target;
            }
        };
        // Simpan angka asli di attribute, set teks ke 0, lalu jalanin fungsi
        const originalValue = counter.innerText;
        counter.innerText = '0';
        counter.setAttribute('data-target', originalValue);
        updateCount();
    });
</script>

<?= $this->endSection() ?>
