<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit"></i>
    Edit Orang Tua
  </h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="<?= base_url('ortu/update/' . $ortu['id']) ?>" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($ortu['nama']) ?>" required>
        </div>
        <div class="form-group">
          <label for="pekerjaan">Pekerjaan</label>
          <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= esc($ortu['pekerjaan']) ?>" required>
        </div>
        <div class="form-group">
          <label for="telepon">Nomor Telepon</label>
          <input type="tel" class="form-control" id="telepon" name="nomor_hp" value="<?= esc($ortu['nomor_hp']) ?>" required pattern="[0-9]{10,13}">
          <small class="form-text text-muted">Format: 08xxxxxxxxxx (10-13 digit)</small>
        </div>
        <div class="form-group">
          <label for="gaji">Gaji</label>
          <input type="number" class="form-control" id="gaji" name="gaji" value="<?= esc($ortu['gaji']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>