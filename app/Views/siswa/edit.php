<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fa fa-edit" aria-hidden="true"></i>
        Edit Data Siswa
    </h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= site_url('siswa/update/' . $siswa['id']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $siswa['nisn'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama_siswa">Nama</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $siswa['kelas'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required value="<?= $siswa['tanggal_lahir'] ?>">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki" <?= ($siswa['jenis_kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="Perempuan" <?= ($siswa['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $siswa['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select class="form-control" id="agama" name="agama" required>
                        <option value="">Pilih Agama</option>
                        <option value="Islam" <?= ($siswa['agama'] == 'Islam') ? 'selected' : '' ?>>Islam</option>
                        <option value="Kristen" <?= ($siswa['agama'] == 'Kristen') ? 'selected' : '' ?>>Kristen</option>
                        <option value="Katolik" <?= ($siswa['agama'] == 'Katolik') ? 'selected' : '' ?>>Katolik</option>
                        <option value="Hindu" <?= ($siswa['agama'] == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                        <option value="Buddha" <?= ($siswa['agama'] == 'Buddha') ? 'selected' : '' ?>>Buddha</option>
                        <option value="Konghucu" <?= ($siswa['agama'] == 'Konghucu') ? 'selected' : '' ?>>Konghucu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="number" class="form-control" id="umur" name="umur" required min="1" max="100" value="<?= $siswa['umur'] ?>">
                </div>
                <div class="form-group">
                    <label for="nomor_hp">Nomor HP</label>
                    <input type="tel" class="form-control" id="nomor_hp" name="nomor_hp" required pattern="[0-9]{10,13}" value="<?= $siswa['nomor_hp'] ?>">
                    <small class="form-text text-muted">Format: 08xxxxxxxxxx (10-13 digit)</small>
                </div>
                <div class="form-group">
                    <label for="foto_siswa">Foto Rumah Siswa</label>
                    <?php if ($siswa['foto_siswa']): ?>
                        <div class="mb-2">
                            <img src="<?= base_url('uploads/fotosiswa/' . $siswa['foto_siswa']) ?>" alt="Foto Siswa" class="img-thumbnail" style="max-width: 200px">
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" name="foto_siswa" accept="image/*">
                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>
                </div>
                <div class="form-group">
                    <label for="status_kurang_mampu">Status KM</label>
                    <select name="status_kurang_mampu" class="form-control" required>
                        <option value="1" <?= ($siswa['status_kurang_mampu'] == 1) ? 'selected' : '' ?>>Kurang Mampu</option>
                        <option value="0" <?= ($siswa['status_kurang_mampu'] == 0) ? 'selected' : '' ?>>Tidak Kurang Mampu</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="<?= site_url('siswa') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>