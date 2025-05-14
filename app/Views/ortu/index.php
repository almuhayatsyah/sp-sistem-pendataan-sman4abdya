<!-- Halaman Orang Tua -->
<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Halaman Orang Tua</h1>
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"> <?= session()->getFlashdata('success') ?> </div>
  <?php endif; ?>
  <a href="<?= base_url('ortu/create') ?>" class="btn btn-primary mb-3">Tambah Orang Tua</a>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Pekerjaan</th>
          <th>No Telepon</th>
          <th>Gaji</th>
          <th>Nama Anak</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($ortus)): ?>
          <tr>
            <td colspan="6" class="text-center">Tidak ada data orang tua.</td>
          </tr>
        <?php else: $no = 1; ?>
          <?php foreach ($ortus as $ortu): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= esc($ortu['nama']) ?></td> <!-- Corrected column -->
              <td><?= esc($ortu['pekerjaan']) ?></td>
              <td><?= esc($ortu['nomor_hp']) ?></td>
              <td><?= esc($ortu['gaji']) ?></td>
              <td><?= esc($ortu['id_siswa']) ?></td> <!-- Corrected column -->
              <td>
                <a href="<?= base_url('ortu/edit/' . $ortu['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('ortu/delete/' . $ortu['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus orang tua ini?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
<?= $this->endSection() ?>