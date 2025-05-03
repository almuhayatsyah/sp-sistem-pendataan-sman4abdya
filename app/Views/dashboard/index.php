<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
  <div class="alert alert-info font-weight-bold text-center mb-4" style="font-size:1.2rem;">
    Selamat datang di Sistem Informasi SMAN 4 Abdya, <span class="text-primary"><?= esc(session('username')) ?></span>!
  </div>
  <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
  <div class="row mb-4">
    <div class="col-md-3">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Siswa</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_siswa ?? 0 ?></div>
        </div>
        <div class="card-footer bg-transparent border-0 p-2 pt-0">
          <a href="<?= base_url('siswa') ?>" class="small text-primary font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Kelas</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_kelas ?? 0 ?></div>
        </div>
        <div class="card-footer bg-transparent border-0 p-2 pt-0">
          <a href="<?= base_url('kelas') ?>" class="small text-success font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Orang Tua</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_orang_tua ?? 0 ?></div>
        </div>
        <div class="card-footer bg-transparent border-0 p-2 pt-0">
          <a href="<?= base_url('ortu') ?>" class="small text-info font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <?php if (session()->get('role') === 'operator'): ?>
      <div class="col-md-3">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total User</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_user ?? 0 ?></div>
          </div>
          <div class="card-footer bg-transparent border-0 p-2 pt-0">
            <a href="<?= base_url('user') ?>" class="small text-warning font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <div class="row mb-4">
    <div class="col-md-3">
      <div class="card mb-2">
        <div class="card-header bg-secondary text-white p-2 text-center" style="font-size:0.95rem;">Status Siswa Kurang Mampu</div>
        <div class="card-body p-2 text-center">
          <canvas id="kurangMampuChart" width="120" height="120"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card mb-2">
        <div class="card-header bg-secondary text-white p-2 text-center" style="font-size:0.95rem;">Jenis Kelamin Siswa</div>
        <div class="card-body p-2 text-center">
          <canvas id="jkChart" width="120" height="120"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-6"></div>
  </div>
  <div class="row">
    <div class="col-12 mb-4">
      <div class="card shadow">
        <div class="card-header py-3 bg-primary text-white">
          <h6 class="m-0 font-weight-bold">
            <i class="fas fa-search"></i> Pencarian Siswa
          </h6>
        </div>
        <div class="card-body">
          <form action="<?= site_url('siswa') ?>" method="get">
            <div class="input-group input-group-lg">
              <input type="text" class="form-control w-100" name="search" placeholder="Cari berdasarkan NISN, Nama, atau Kelas..." value="<?= $search ?? '' ?>" style="border-radius: 2rem 0 0 2rem;">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" style="border-radius: 0 2rem 2rem 0;">
                  <i class="fas fa-search fa-sm"></i> Cari
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div id="map-container" class="mb-3">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.9212491429833!2d96.8416!3d4.6434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30386a!2sSMAN%204%20Aceh%20Barat%20Daya!5e0!3m2!1sen!2sid!4v1647908453207"
          width="100%"
          height="450"
          style="border:0; border-radius: 4px;"
          allowfullscreen=""
          loading="lazy">
        </iframe>
      </div>
      <div class="text-muted small">
        <i class="fas fa-info-circle"></i>
        Peta menampilkan lokasi tempat tinggal siswa. Nantinya akan diintegrasikan dengan koordinat GPS yang sebenarnya.
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const kurangMampuData = {
    labels: ['Siswa Kurang Mampu', 'Siswa Tidak Kurang Mampu'],
    datasets: [{
      data: [<?= $kurang_mampu ?>, <?= $tidak_kurang_mampu ?>],
      backgroundColor: ['#8e24aa', '#29b6f6']
    }]
  };
  const jkData = {
    labels: ['Siswa Laki-laki', 'Siswa Perempuan'],
    datasets: [{
      data: [<?= $laki_laki ?>, <?= $perempuan ?>],
      backgroundColor: ['#512da8', '#26c6da']
    }]
  };
  new Chart(document.getElementById('kurangMampuChart'), {
    type: 'pie',
    data: kurangMampuData,
    options: {
      responsive: false,
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            font: {
              size: 10
            }
          }
        }
      }
    }
  });
  new Chart(document.getElementById('jkChart'), {
    type: 'pie',
    data: jkData,
    options: {
      responsive: false,
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            font: {
              size: 10
            }
          }
        }
      }
    }
  });
</script>
<?= $this->endSection(); ?>