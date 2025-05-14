<?php $this->extend('layout/pengunjung'); ?>
<?php $this->section('content'); ?>
<style>
  .table-pengunjung th,
  .table-pengunjung td {
    padding: 0.5rem 0.6rem !important;
    font-size: 0.98rem;
  }

  .table-pengunjung th {
    background: #2e2eff !important;
    color: #fff !important;
    font-weight: bold;
  }

  .table-pengunjung td {
    background: #fff !important;
    color: #222 !important;
  }
</style>
<div class="container py-4">
  <div class="row justify-content-center mb-3">
    <div class="col-12">
      <form class="mb-3" action="" method="get">
        <div class="input-group input-group-lg">
          <input type="text" class="form-control" name="search" placeholder="Cari Berdasarkan Nama dan NISN Siswa" style="border-radius:2rem 0 0 2rem;">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" style="border-radius:0 2rem 2rem 0;"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>
      <div class="table-responsive mb-4">
        <table class="table table-bordered table-pengunjung text-center w-100">
          <thead>
            <tr>
              <th style="width:4%">No</th>
              <th style="width:13%">Nisn</th>
              <th style="width:18%">Nama</th>
              <th style="width:13%">Kelas</th>
              <th style="width:22%">Alamat</th>
              <th style="width:13%">Jenis Kelamin</th>
              <th style="width:17%">Status kM</th>
              <th style="width:20%">Foto Rumah</th>
              <th style="width:17%">LongLatitude</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1 + (intval($_GET['page_siswa'] ?? 1) - 1) * 5;
            if (empty($siswa)): ?>
              <tr>
                <td colspan="7">Tidak ada data siswa.</td>
              </tr>
              <?php else: foreach ($siswa as $row): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= esc($row['nisn'] ?? '-') ?></td>
                  <td><?= esc($row['nama_siswa'] ?? '-') ?></td>
                  <td><?= esc($row['nama_kelas'] ?? '-') ?></td>
                  <td><?= esc($row['alamat'] ?? '-') ?></td>
                  <td><?= esc($row['jenis_kelamin'] ?? '-') ?></td>
                  <td class="text-center">
                    <?php if ($row['status_kurang_mampu'] == 1): ?>
                      <span class="badge badge-warning">
                        <i class="fas fa-user-shield"></i> Kurang Mampu
                      </span>
                    <?php else: ?>
                      <span class="badge badge-info">
                        <i class="fas fa-user-check"></i> Tidak Kurang Mampu
                      </span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <?php if ($row['foto_siswa']): ?>
                      <img src="<?= base_url('uploads/fotosiswa/' . $row['foto_siswa']) ?>"
                        alt="Foto <?= $row['nama_siswa'] ?>"
                        class="img-thumbnail foto-siswa-thumb"
                        style="max-width: 50px; cursor:pointer;"
                        data-toggle="modal"
                        data-target="#fotoModal"
                        data-foto="<?= base_url('uploads/fotosiswa/' . $row['foto_siswa']) ?>">
                    <?php else: ?>
                      <span class="badge badge-secondary">No Photo</span>
                    <?php endif; ?>
                  </td>

                  <td><?= rand(96, 97) . '.' . rand(100000, 999999) . ', ' . rand(4, 5) . '.' . rand(100000, 999999) ?></td>
                </tr>
            <?php endforeach;
            endif; ?>
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center mb-4">
        <?= $pager->links('siswa', 'bootstrap_pagination') ?>
      </div>
      <div class="mb-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.9212491429833!2d96.8416!3d4.6434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30386a!2sSMAN%204%20Aceh%20Barat%20Daya!5e0!3m2!1sen!2sid!4v1647908453207" width="100%" height="500px" style="border:0; border-radius: 8px;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </div>
</div>

<!-- d -->
<div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="fotoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="fotoModalLabel">Foto Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img id="fotoModalImage" src="" alt="Foto Siswa" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<script>
  // Add this script to handle the modal image
  document.querySelectorAll('.foto-siswa-thumb').forEach(img => {
    img.addEventListener('click', function() {
      const modalImage = document.getElementById('fotoModalImage');
      modalImage.src = this.getAttribute('data-foto');
    });
  });
</script>

<?php $this->endSection(); ?>