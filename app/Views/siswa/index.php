<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-users"></i>
            Daftar Siswa
        </h1>
        <div>
            <a href="<?= site_url('siswa/create') ?>" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Siswa</span>
            </a>
            <a href="<?= site_url('siswa/export-pdf') ?>" class="btn btn-danger btn-icon-split ml-2">
                <span class="icon text-white-50">
                    <i class="fas fa-file-pdf"></i>
                </span>
                <span class="text">Export PDF</span>
            </a>
            <a href="<?= site_url('siswa/export-excel') ?>" class="btn btn-success btn-icon-split ml-2">
                <span class="icon text-white-50">
                    <i class="fas fa-file-excel"></i>
                </span>
                <span class="text">Export Excel</span>
            </a>
        </div>
    </div>

    <!-- Search Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-search"></i>
                Pencarian Siswa
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= site_url('siswa') ?>" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan NISN, Nama, atau Kelas..." value="<?= $search ?? '' ?>">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i> Cari
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Data Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table"></i>
                Data Siswa
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Umur</th>
                            <th class="text-center">Agama</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th class="text-center">Lokasi</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Status KM</th>
                            <th class="text-center">Foto Rumah</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 + (10 * ($pager->getCurrentPage() - 1)); ?>
                        <?php foreach ($siswa as $s): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $s['nisn'] ?></td>
                                <td><?= $s['nama_siswa'] ?></td>
                                <td class="text-center"><?= $s['kelas'] ?></td>
                                <td class="text-center"><?= $s['umur'] ?> Tahun</td>
                                <td class="text-center"><?= $s['agama'] ?></td>
                                <td class="text-center"><?= date('d/m/Y', strtotime($s['tanggal_lahir'])) ?></td>
                                <td><?= $s['alamat'] ?></td>
                                <td class="text-center">
                                    <?php if (isset($s['nama_lokasi'])): ?>
                                        <span class="badge badge-info">
                                            <i class="fas fa-map-marker-alt"></i> <?= $s['nama_lokasi'] ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="badge badge-secondary">Belum ditentukan</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($s['jenis_kelamin'] == 'Laki-laki'): ?>
                                        <span class="badge badge-primary">
                                            <i class="fas fa-male"></i> Laki-laki
                                        </span>
                                    <?php else: ?>
                                        <span class="badge badge-success">
                                            <i class="fas fa-female"></i> Perempuan
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($s['status_kurang_mampu'] == 1): ?>
                                        <span class="badge badge-warning">
                                            <i class="fas fa-user-shield"></i> Kurang Mampu
                                        </span>
                                    <?php else: ?>
                                        <span class="badge badge-info">
                                            <i class="fas fa-user-check"></i> Tidak KM
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($s['foto_siswa']): ?>
                                        <img src="<?= base_url('uploads/fotosiswa/' . $s['foto_siswa']) ?>" 
                                             alt="Foto <?= $s['nama_siswa'] ?>" 
                                             class="img-thumbnail foto-siswa-thumb" 
                                             style="max-width: 50px; cursor:pointer;"
                                             data-toggle="modal" 
                                             data-target="#fotoModal" 
                                             data-foto="<?= base_url('uploads/fotosiswa/' . $s['foto_siswa']) ?>">
                                    <?php else: ?>
                                        <span class="badge badge-secondary">No Photo</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= site_url('siswa/edit/' . $s['id']) ?>" 
                                       class="btn btn-warning btn-sm btn-circle" 
                                       data-toggle="tooltip" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" 
                                       class="btn btn-danger btn-sm btn-circle" 
                                       onclick="confirmDelete('<?= $s['id'] ?>')"
                                       data-toggle="tooltip" 
                                       title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="mt-4">
                <?= $pager->links('siswa', 'bootstrap_pagination') ?>
            </div>
        </div>
    </div>

    <!-- Google Maps -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-map-marker-alt"></i>
                Lokasi Siswa
            </h6>
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data siswa ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" id="deleteButton" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan modal untuk foto -->
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
        <img src="" id="fotoModalImg" class="img-fluid" style="max-height: 400px;">
      </div>
    </div>
  </div>
</div>

<script>
function confirmDelete(id) {
    $('#deleteButton').attr('href', '<?= site_url('siswa/delete/') ?>' + id);
    $('#deleteModal').modal('show');
}

// Initialize tooltips
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    // Modal foto siswa
    $('.foto-siswa-thumb').on('click', function(){
        var src = $(this).data('foto');
        $('#fotoModalImg').attr('src', src);
    });
});
</script>

<?= $this->endSection() ?>