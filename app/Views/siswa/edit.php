<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Edit Data Siswa
    </h1>
    <div class="card shadow mb-4">
        <d class="card-body">
            <form action="/siswa/update/<?= $siswa['id'] ?>" method="post">
                <div class="form-group">
                    <label for="nisn">NISN:</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" required>
                </div>

                <div class="form-group">
                    <label for="nama_siswa">Nama:</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>" required><br>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas:</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $siswa['kelas'] ?>" required><br>
                </div>

                <div class="form-group">
                    <label for="kelas">Tanggal Lahir:</label>
                    <input type="date" class="form-control" name="tanggal_lahir" value="<?= old('tanggal_lahir', $siswa['tanggal_lahir'] ?? '') ?>" required><br>

                </div>


                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select id="jenis_kelamin" class="form-control" name="jenis_kelamin" required>
                        <option value="laki-laki" class="form-control" <?= $siswa['jenis_kelamin'] == 'laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="perempuan" class="form-control" <?= $siswa['jenis_kelamin'] == 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
                    </select><br>
                </div>


                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea id="alamat" class="form-control" name="alamat" required><?= $siswa['alamat'] ?></textarea><br>
                </div>

                <form action="<?= site_url('siswa/store') ?>" method="post" enctype="multipart/form-data">
                    <!-- Form Fields -->
                    <div class="form-group">
                        <label for="foto_siswa">Foto Siswa</label>
                        <input type="file" class="form-control" name="foto_siswa" required>
                    </div>
                    <div class="form-group">
                        <label for="status_kurang_mampu">Status KM</label>
                        <select name="status_kurang_mampu" class="form-control" required>
                            <option value="1">Kurang Mampu</option>
                            <option value="0">Tidak Kurang Mampu</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>


            </form>
    </div>
</div>
</div>
<?= $this->endSection() ?>