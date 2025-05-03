<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="<?= base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
  <style>
    body {
      background: #2e2eff;
      min-height: 100vh;
    }

    .login-main-card {
      background: #fff;
      border-radius: 1.5rem;
      box-shadow: 0 4px 24px rgba(0, 0, 0, 0.12);
      padding: 2.5rem 2rem;
      margin-top: 3rem;
      border: 8px solid #2e2eff;
      max-width: 900px;
    }

    .login-logo-img {
      width: 200px;
      height: auto;
      display: block;
      margin: 0 auto 1.5rem auto;
    }

    .login-title {
      font-size: 1.2rem;
      font-weight: bold;
      text-align: center;
      margin-bottom: 1.5rem;
      letter-spacing: 1px;
    }

    .login-form-label {
      font-weight: bold;
    }

    .login-input {
      border-radius: 2rem !important;
      border: 3px solid #2e2eff !important;
      padding-left: 1.5rem;
      font-weight: 500;
    }

    .login-btn {
      border-radius: 2rem;
      font-weight: bold;
      font-size: 1.1rem;
      background: #2e2eff;
      border: none;
    }

    @media (max-width: 767px) {
      .login-main-card {
        padding: 1.5rem 0.5rem;
      }

      .login-logo-img {
        width: 120px;
      }
    }
  </style>
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
    <div class="login-main-card w-100">
      <div class="row align-items-center">
        <div class="col-md-5 text-center mb-4 mb-md-0">
          <div class="login-title">SELAMAT DATANG DI APLIKASI TITIK KOORDINAT SMAN4 ABDYA</div>
          <img src="<?= base_url('images/logosekolah.png') ?>" alt="Logo Sekolah" class="login-logo-img">
        </div>
        <div class="col-md-7">
          <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
              <?= session()->getFlashdata('error') ?>
            </div>
          <?php endif; ?>
          <form action="<?= base_url('login') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group mb-4">
              <label for="username" class="login-form-label">Username</label>
              <input type="text" name="username" id="username" class="form-control login-input" required autofocus>
            </div>
            <div class="form-group mb-4">
              <label for="password" class="login-form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control login-input" required>
            </div>
            <div class="form-group mb-3">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                <label class="custom-control-label" for="remember">Ingat Saya</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block login-btn">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>