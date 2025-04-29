<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - SMAN 4 ABDYA</title>
  <link href="<?= base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                <img src="<?= base_url('images/logosekolah.png') ?>" alt="Logo SMAN 4 ABDYA" class="img-fluid p-5">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                  </div>

                  <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger">
                      <?= session()->getFlashdata('error') ?>
                    </div>
                  <?php endif; ?>

                  <form class="user" action="<?= base_url('auth/login') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>
</body>

</html>