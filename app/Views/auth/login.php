<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | LibreSchool</title>

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css') ?>" rel="stylesheet">

    <style>
        body {
            background-color: #121212; /* Gelap pekat */
            color: #eeeeee;
            font-family: 'Inter', sans-serif;
            margin: 0;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            /* Tambahan aksen cahaya di pojok layar */
            background: radial-gradient(circle at top right, rgba(13, 110, 253, 0.15), transparent),
                        radial-gradient(circle at bottom left, rgba(13, 110, 253, 0.05), transparent);
        }

        .login-card {
            width: 400px;
            background-color: #1e1e1e; /* Warna abu-abu sangat gelap */
            border: 1px solid #333;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            padding: 2rem;
        }

        .brand-logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: #0d6efd;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .form-control {
            background-color: #2a2a2a;
            border: 1px solid #444;
            color: #fff;
            padding: 0.75rem 1rem;
        }

        .form-control:focus {
            background-color: #2d2d2d;
            border-color: #0d6efd;
            color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .btn-primary {
            padding: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            border-radius: 8px;
        }

        .form-label {
            color: #a0a0a0;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .alert {
            font-size: 0.85rem;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-card">
            <div class="brand-logo">
                LibreSchool<span class="text-white">App</span>
            </div>
            <p class="text-secondary text-center small mb-4">Silahkan masuk ke akun Anda</p>

            <?php if (session()->getFlashdata('error') || session()->getFlashdata('salahpw')): ?>
                <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger py-2 d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <div><?= session()->getFlashdata('error') ?: session()->getFlashdata('salahpw') ?></div>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/proses-login') ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text bg-dark border-secondary text-secondary">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" name="username" class="form-control" placeholder="admin123" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-dark border-secondary text-secondary">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>

                <button class="btn btn-primary w-100 mb-3 shadow">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Sign In
                </button>
            </form>

            <div class="text-center">
                <p class="small text-secondary mb-1">Belum punya akun?</p>
                <a href="<?= base_url('users/create') ?>" class="text-decoration-none text-info small fw-bold">
                    Daftar Baru Sekarang
                </a>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>