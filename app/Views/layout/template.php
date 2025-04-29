<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>

    <!-- CSS SB Admin -->
    <link href="<?= base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>">

    <!-- jQuery -->
    <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Custom scripts -->
    <script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>

    <style>
        .sidebar .nav-item .nav-link {
            padding: 0.75rem 1rem;
            width: 100%;
        }

        .sidebar .nav-item .active {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 0.35rem;
        }

        .sidebar .nav-item .collapse-inner .active {
            background-color: #4e73df;
            color: white !important;
        }

        .collapse-item:hover {
            background-color: #eaecf4;
            border-radius: 0.35rem;
        }

        /* Custom Pagination Styling */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
            gap: 5px;
        }

        .pagination li {
            list-style: none;
        }

        .pagination li a,
        .pagination li span {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            padding: 0 12px;
            background: #fff;
            border: 2px solid #4e73df;
            border-radius: 50%;
            color: #4e73df;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .pagination li a:hover {
            background: #4e73df;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(78, 115, 223, 0.3);
        }

        .pagination li.active span {
            background: #4e73df;
            color: #fff;
            border-color: #4e73df;
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(78, 115, 223, 0.3);
        }

        .pagination li.disabled span {
            background: #f8f9fc;
            color: #858796;
            border-color: #e3e6f0;
            cursor: not-allowed;
        }

        /* Pagination arrows */
        .pagination .previous a,
        .pagination .next a {
            font-size: 18px;
            padding: 0;
        }

        /* Hover effect for table rows */
        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9fc;
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        /* Animation for active elements */
        .active {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(78, 115, 223, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(78, 115, 223, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(78, 115, 223, 0);
            }
        }
    </style>
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
                <div class="sidebar-brand-text">SMAN 4 Abdya</div>
            </a>
            <hr class="sidebar-divider">

            <!-- Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link <?= current_url() == base_url('dashboard') ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Data Siswa Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseDataSiswa" aria-expanded="true" aria-controls="collapseDataSiswa">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Siswa</span>
                </a>
                <div id="collapseDataSiswa" class="collapse show" aria-labelledby="headingDataSiswa" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= current_url() == base_url('siswa') ? 'active' : '' ?>" href="<?= base_url('siswa') ?>">
                            <i class="fas fa-users fa-fw"></i> Daftar Siswa
                        </a>
                        <a class="collapse-item <?= current_url() == base_url('siswa/create') ? 'active' : '' ?>" href="<?= base_url('siswa/create') ?>">
                            <i class="fas fa-user-plus fa-fw"></i> Tambah Siswa
                        </a>
                        <a class="collapse-item <?= current_url() == base_url('siswa/laporan_siswa') ? 'active' : '' ?>" href="<?= base_url('siswa/laporan_siswa') ?>">
                            <i class="fas fa-file-alt fa-fw"></i> Laporan Siswa
                        </a>
                    </div>
                </div>
            </li>

            <!-- Manajemen Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseManajemen" aria-expanded="true" aria-controls="collapseManajemen">
                    <i class="fas fa-fw fa-columns"></i>
                    <span>Manajemen</span>
                </a>
                <div id="collapseManajemen" class="collapse" aria-labelledby="headingManajemen" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= current_url() == base_url('kelas') ? 'active' : '' ?>" href="<?= base_url('kelas') ?>">
                            <i class="fas fa-chalkboard fa-fw"></i> Kelas
                        </a>
                        <a class="collapse-item <?= current_url() == base_url('ortu') ? 'active' : '' ?>" href="<?= base_url('ortu') ?>">
                            <i class="fas fa-users fa-fw"></i> Orang Tua
                        </a>
                        <a class="collapse-item <?= current_url() == base_url('user') ? 'active' : '' ?>" href="<?= base_url('user') ?>">
                            <i class="fas fa-user fa-fw"></i> User
                        </a>
                    </div>
                </div>
            </li>

            <!-- Pengaturan Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePengaturan" aria-expanded="true" aria-controls="collapsePengaturan">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="collapsePengaturan" class="collapse" aria-labelledby="headingPengaturan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= current_url() == base_url('pengaturan/google-maps') ? 'active' : '' ?>" href="<?= base_url('pengaturan/google-maps') ?>">
                            <i class="fas fa-map-marked-alt fa-fw"></i> Google Maps API
                        </a>
                        <a class="collapse-item <?= current_url() == base_url('pengaturan/log') ? 'active' : '' ?>" href="<?= base_url('pengaturan/log') ?>">
                            <i class="fas fa-history fa-fw"></i> Log Aktivitas
                        </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Logout -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-sign-out-alt fa-fw"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>© <?= date('Y') ?> SMAN 4 ACEH BARAT DAYA</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Simpan status collapse di localStorage
            $('.nav-link[data-toggle="collapse"]').on('click', function() {
                let target = $(this).attr('data-target');
                let isExpanded = $(target).hasClass('show');
                localStorage.setItem('sidebar_' + target, isExpanded ? 'collapsed' : 'expanded');
            });

            // Cek dan terapkan status collapse yang tersimpan
            $('.nav-link[data-toggle="collapse"]').each(function() {
                let target = $(this).attr('data-target');
                let savedStatus = localStorage.getItem('sidebar_' + target);
                if (savedStatus === 'expanded') {
                    $(target).addClass('show');
                }
            });

            // Tambahkan class active pada parent nav-item jika ada child yang active
            if ($('.collapse-item.active').length > 0) {
                $('.collapse-item.active').closest('.nav-item').addClass('active');
            }

            // Hapus data-parent dari semua collapse untuk memungkinkan multiple collapse
            $('.collapse').removeAttr('data-parent');
        });
    </script>
</body>

</html>