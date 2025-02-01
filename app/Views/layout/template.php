<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <!-- CSS SB Admin -->
    <link href="<?= base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/') ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('images/logosekolah.png') ?>" alt="Logo" class="img-fluid" style="height: 50px; margin-right: 10px;">
                </div>
                <div>
                    <div class="row">
                        SMAN 4 Abdya
                    </div>
                </div>
            </a>
            <hr class="sidebar-divider">
            <!-- Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('siswa') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Siswa</span>
                </a>
            </li>
            <!-- Tambahkan menu lainnya -->
        </ul>
        <!-- Content -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
        <div>
            <footer class="footer">
                <div class="footerContainer">
                    <p class="copyright">© SMAN 4 ACEH BARAT</p>
                </div>
            </footer>
        </div>
    </div>
    </div>
    <!-- JS SB Admin -->
    <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>
</body>

</html>