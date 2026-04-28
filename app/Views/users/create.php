<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Baru | LibreSchool</title>

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css') ?>" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: #eeeeee;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at bottom right, rgba(25, 135, 84, 0.1), transparent),
                        radial-gradient(circle at top left, rgba(13, 110, 253, 0.1), transparent);
        }

        .register-card {
            width: 100%;
            max-width: 500px;
            background-color: #1e1e1e;
            border: 1px solid #333;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            padding: 2.5rem;
            margin: 20px;
        }

        .brand-logo {
            font-size: 1.5rem;
            font-weight: 800;
            color: #0d6efd;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-label {
            color: #a0a0a0;
            font-size: 0.85rem;
            font-weight: 600;
            text-uppercase: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control, .form-select {
            background-color: #2a2a2a;
            border: 1px solid #444;
            color: #fff;
            padding: 0.7rem 1rem;
        }

        .form-control:focus, .form-select:focus {
            background-color: #2d2d2d;
            border-color: #198754; /* Warna hijau sukses saat fokus */
            color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
        }

        .btn-success {
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 8px;
            background-color: #198754;
        }

        .input-group-text {
            background-color: #252525;
            border-color: #444;
            color: #888;
        }
    </style>
</head>

<body>

    <div class="register-card">
        <div class="brand-logo">
            <i class="bi bi-person-plus-fill me-2"></i>Daftar <span class="text-white">LibreSchool</span>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger bg-danger bg-opacity-10 border-0 text-danger small py-2">
                <i class="bi bi-exclamation-circle me-2"></i><?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('users/store') ?>" method="post" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Contoh: Budi Santoso" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="username123" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Role Pengguna</label>
                <select name="role" class="form-select" required>
                    <option value="" disabled selected>Pilih hak akses...</option>
                    <option value="admin">Admin Perpustakaan</option>
                    <option value="user">Siswa / Anggota</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">Foto Profil <span class="text-lowercase fw-normal">(Opsional)</span></label>
                <div class="input-group">
                    <label class="input-group-text" for="inputFoto"><i class="bi bi-image"></i></label>
                    <input type="file" name="foto" class="form-control" id="inputFoto" accept="image/*">
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100 shadow-sm mb-3">
                <i class="bi bi-check-circle me-1"></i> Buat Akun Sekarang
            </button>

            <div class="text-center">
                <a href="<?= base_url('login') ?>" class="text-secondary text-decoration-none small">
                    Sudah punya akun? <span class="text-primary fw-bold">Login di sini</span>
                </a>
            </div>

        </form>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>