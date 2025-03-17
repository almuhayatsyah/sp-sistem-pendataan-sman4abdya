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


        <script>
            $(document).ready(function() {
                $('.nav-link[data-bs-toggle="collapse"]').on('click', function() {
                    let target = $(this).attr('data-bs-target');
                    $(target).collapse('toggle');
                });
            });
        </script>

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
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Data Siswa Dropdown -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataSiswa" aria-expanded="false" aria-controls="collapseDataSiswa">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Data Siswa</span> </a>
                    <!-- batas -->
                    <div id="collapseDataSiswa" class="collapse" aria-labelledby="headingDataSiswa" data-bs-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('siswa') ?>">
                                <i class="fas fa-users"></i> Daftar Siswa
                            </a>
                            <a class="collapse-item" href="<?= base_url('siswa/create') ?>">
                                <i class="fas fa-user-plus"></i> Tambah Siswa
                            </a>
                            <a class="collapse-item" href="<?= base_url('siswa/create') ?>">
                                <i class="fas fa-file-alt"></i> Laporan Siswa
                            </a>

                        </div>



                </li>
            </ul>
            <!-- Tambahkan menu lainnya -->
        </ul>
        <!-- Content -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?= $this->renderSection('content') ?> <!-- Pastikan section 'content' ditampilkan disini -->
            </div>
        </div>

        <!-- <div>
            <footer class="footer">
                <div class="footerContainer">
                    <p class="copyright">© SMAN 4 ACEH BARAT</p>
                </div>
            </footer>
        </div> -->
    </div>
    <!-- JS SB Admin -->
    <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>
</body>

</html>