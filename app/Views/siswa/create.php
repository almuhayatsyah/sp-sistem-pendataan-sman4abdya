<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Tambah Siswa Baru
    </h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= site_url('siswa/store') ?>" method="post" enctype="multipart/form-data">
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
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required value="<?= old('tanggal_lahir') ? old('tanggal_lahir') : (isset($siswa['tanggal_lahir']) ? $siswa['tanggal_lahir'] : '') ?>">
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
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select class="form-control" id="agama" name="agama" required>
                        <option value="">Pilih Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="number" class="form-control" id="umur" name="umur" placeholder="Masukkan Umur" required min="1" max="100">
                </div>
                <div class="form-group">
                    <label for="nomor_hp">Nomor HP</label>
                    <input type="tel" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Masukkan Nomor HP" required pattern="[0-9]{10,13}">
                    <small class="form-text text-muted">Format: 08xxxxxxxxxx (10-13 digit)</small>
                </div>
                <div class="form-group">
                    <label for="foto_siswa">Foto Rumah Siswa</label>
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
<?= $this->endSection() ?>