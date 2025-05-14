<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus"></i>
    Tambah Orang Tua
  </h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="<?= base_url('OrtuController/store') ?>" method="post">
        <?= csrf_field() ?> <!-- Add this line for CSRF protection -->
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
        </div>
        <div class="form-group">
          <label for="pekerjaan">Pekerjaan</label>
          <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Pekerjaan" required>
        </div>
        <div class="form-group">
          <label for="telepon">Nomor Telepon</label>
          <input type="tel" class="form-control" id="telepon" name="nomor_hp" placeholder="Masukkan Nomor Telepon" required pattern="[0-9]{10,13}">
          <small class="form-text text-muted">Format: 08xxxxxxxxxx (10-13 digit)</small>
        </div>
        <div class="form-group">
          <label for="gaji">Gaji</label>
          <input type="number" class="form-control" id="gaji" name="gaji" placeholder="Masukkan Gaji" required>
        </div>
        <div class="form-group">
          <label for="id_siswa">Nama Anak</label>
          <input type="id_siswa" class="form-control" id="id_siswa" name="id_sswa" placeholder="Masukkan Nama Anak/siswa" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>