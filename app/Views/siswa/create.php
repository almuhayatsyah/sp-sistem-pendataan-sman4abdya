<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Tambah Siswa Baru
    </h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('siswa/store') ?>" method="post">
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama_siswa" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas" required>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="<?= old('tanggal_lahir', $siswa['tanggal_lahir'] ?? '') ?>" required><br>
                    </div>

                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat" required></textarea>
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


        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>