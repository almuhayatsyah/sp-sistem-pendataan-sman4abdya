<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'SISTEM INFORMASI TITIK KOORDINAT SISWA KURANG MAMPU SMAN 4 ABDYA' ?></title>
  <link href="<?= base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
  <style>
    body {
      background: #f4f6fa;
    }

    .pengunjung-header {
      background: #4e2eff;
      color: #fff;
      padding: 1rem 0.5rem 0.5rem 0.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .pengunjung-header .logo {
      height: 48px;
      margin-right: 1rem;
    }

    .pengunjung-header .app-title {
      font-size: 1.2rem;
      font-weight: bold;
      letter-spacing: 1px;
      text-shadow: 1px 1px 2px #2222;
    }

    .pengunjung-header .menu {
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }

    .pengunjung-header .menu a {
      color: #fff;
      font-weight: bold;
      text-decoration: none;
      padding: 0.3rem 1.2rem;
      border-radius: 1.2rem;
      transition: background 0.2s;
    }

    .pengunjung-header .menu a.active,
    .pengunjung-header .menu a:hover {
      background: #2e2eff;
    }

    .pengunjung-header .profile-icon {
      font-size: 1.5rem;
      margin-left: 1rem;
      color: #fff;
      background: #2e2eff;
      border-radius: 50%;
      padding: 0.3rem 0.5rem;
    }

    .pengunjung-footer {
      background: #111;
      color: #fff;
      padding: 0.7rem 0.5rem;
      font-size: 0.95rem;
      margin-top: 2rem;
    }

    .pengunjung-footer .row>div {
      margin-bottom: 0.5rem;
    }

    @media (max-width: 767px) {
      .pengunjung-header {
        flex-direction: column;
        align-items: flex-start;
      }

      .pengunjung-header .menu {
        margin-top: 0.5rem;
      }
    }
  </style>
</head>

<body>
  <header class="pengunjung-header">
    <div class="d-flex align-items-center">
      <img src="<?= base_url('images/logosekolah.png') ?>" alt="Logo" class="logo">
      <span class="app-title">SISTEM INFORMASI TITIK KOORDINAT SISWA<br>KURANG MAMPU SMAN 4 ABDYA</span>
    </div>
    <nav class="menu">
      <a href="<?= base_url('pengunjung') ?>" class="<?= (current_url() == base_url('pengunjung')) ? 'active' : '' ?>">BERANDA</a>
      <a href="<?= base_url('pengunjung') ?>" class="<?= (current_url() == base_url('pengunjung')) ? 'active' : '' ?>">DAFTAR SISWA</a>
      <a href="<?= base_url('auth/logout') ?>" class="profile-icon" title="Logout"> <i class="fas fa-sign-out-alt"></i> </a>
    </nav>
  </header>
  <main style="min-height:60vh;">
    <?= $this->renderSection('content') ?>
  </main>
  <footer class="pengunjung-footer">
    <div class="row">
      <div class="col-md-3"><b>☎ Telpon</b><br>0813xxxxxx</div>
      <div class="col-md-3"><b>✉ Email</b><br>sman4@gmail.com</div>
      <div class="col-md-2"><b>📠 Fax</b><br>098x</div>
      <div class="col-md-4"><b>📍 Alamat</b><br>JL. NASIONAL MEULABOH-BLANG PIDIE Km.16 ALUE PADEE, KEC. KUALA BATEE KAB. ACEH BARAT DAYA</div>
    </div>
  </footer>
</body>

</html>