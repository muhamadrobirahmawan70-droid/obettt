<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LibreSchool</title>

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
<link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css">

<style>
    /* Custom warna loading bar-nya biar cocok sama tema biru kamu */
    #nprogress .bar {
        background: #0d6efd !important;
        height: 3px !important;
    }
</style>
    <style>
        body {
            font-family: "Inter", "Segoe UI", Roboto, sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: #121212; /* Background dasar gelap */
            color: #eeeeee;
            margin: 0;
        }

        /* Sidebar - Ubah dari Kuning ke Dark */
        .sidebar {
            width: 240px; /* Diperlebar sedikit agar teks tidak sesak */
            background-color: #1e1e1e; /* Warna abu-abu sangat gelap */
            border-right: 1px solid #333;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
        }

        /* Konten Utama */
        .content {
            flex-grow: 1;
            padding: 25px;
            background-color: #121212; /* Senada dengan body */
            overflow-y: auto;
        }

        /* Custom Scrollbar untuk tema gelap */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #1e1e1e;
        }
        ::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #444;
        }

        /* Menghilangkan padding default link di sidebar agar rapi */
        .sidebar a {
            text-decoration: none;
            color: inherit;
        }
        /* Definisikan animasinya */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Class untuk membungkus konten */
.page-transition {
    animation: fadeIn 0.6s ease-out forwards;

}

/* Sembunyikan body sebentar sebelum animasi jalan biar gak flickering */
body {
    background-color: #121212; /* Sesuaikan warna dark mode kamu */
}
    </style>
</head>

<body class="bg-dark"> <nav id="sidebar" class="sidebar shadow">
        <?php include(APPPATH . 'Views/layouts/menu.php'); ?>
    </nav>

    <<div class="page-transition">
    <?= $this->renderSection('content') ?>
</div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        // Inisialisasi semua tabel dengan class 'datatable'
        $('.datatable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json" // Bahasa Indonesia
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        <?php if (session()->getFlashdata('success')) : ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata('success') ?>',
                timer: 2000,
                showConfirmButton: false
            });
        <?php endif; ?>
    });
</script>
<script>
    // Jalanin loading bar pas halaman mulai pindah
    NProgress.start();
    
    // Berhenti pas halaman selesai dimuat
    window.onload = function() {
        NProgress.done();
    };

    // Opsional: Jalanin pas link diklik biar berasa cepet
    $('a').on('click', function() {
        if (!$(this).attr('target')) {
            NProgress.start();
        }
    });
</script>
</body>

</html>