<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
    </a>
  </div>

  <!-- Content Row -->
  <div class="row">
    <!-- Jumlah Siswa Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Total Siswa</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_siswa ?? 0 ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Jumlah Kelas Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Total Kelas</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_kelas ?? 0 ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Jumlah Orang Tua Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                Total Orang Tua</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_orang_tua ?? 0 ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-friends fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Jumlah User Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Total User</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_user ?? 0 ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">
    <!-- Grafik Siswa per Kelas -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Distribusi Siswa per Kelas</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="siswaPerKelasChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- Log Aktivitas Terbaru -->
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Log Aktivitas Terbaru</h6>
        </div>
        <div class="card-body">
          <div class="list-group">
            <?php if (isset($log_aktivitas) && !empty($log_aktivitas)): ?>
              <?php foreach ($log_aktivitas as $log): ?>
                <div class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1"><?= esc($log['aktivitas']) ?></h6>
                    <small><?= date('d/m/Y H:i', strtotime($log['waktu'])) ?></small>
                  </div>
                  <?php if (!empty($log['nisn'])): ?>
                    <p class="mb-1">NISN: <?= esc($log['nisn']) ?></p>
                  <?php endif; ?>
                  <small>User ID: <?= esc($log['user_id']) ?></small>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p class="text-center">Tidak ada log aktivitas terbaru</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Data untuk grafik
  const kelasLabels = <?= json_encode($kelas_labels ?? []) ?>;
  const siswaData = <?= json_encode($siswa_data ?? []) ?>;

  // Membuat grafik
  const ctx = document.getElementById('siswaPerKelasChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: kelasLabels,
      datasets: [{
        label: 'Jumlah Siswa',
        data: siswaData,
        backgroundColor: 'rgba(78, 115, 223, 0.5)',
        borderColor: 'rgba(78, 115, 223, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<?= $this->endSection(); ?>