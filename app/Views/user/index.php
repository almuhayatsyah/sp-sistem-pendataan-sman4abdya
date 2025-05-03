<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Daftar User</h1>
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"> <?= session()->getFlashdata('success') ?> </div>
  <?php endif; ?>
  <a href="<?= base_url('user/create') ?>" class="btn btn-primary mb-3">Tambah User</a>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Role</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($users)): ?>
          <tr>
            <td colspan="6" class="text-center">Tidak ada data user.</td>
          </tr>
          <?php else: $no = 1;
          foreach ($users as $user): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= esc($user['username']) ?></td>
              <td><?= esc($user['role']) ?></td>
              <td><?= esc($user['created_at']) ?></td>
              <td><?= esc($user['updated_at']) ?></td>
              <td>
                <a href="<?= base_url('user/edit/' . $user['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('user/delete/' . $user['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus user ini?')">Hapus</a>
              </td>
            </tr>
        <?php endforeach;
        endif; ?>
      </tbody>
    </table>
  </div>

  <div class="card mt-4">
    <div class="card-header bg-secondary text-white">
      Log Aktivitas Terbaru
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Waktu</th>
            <th>Aktivitas</th>
            <th>User</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($log_aktivitas)): ?>
            <tr>
              <td colspan="3" class="text-center">Tidak ada log aktivitas.</td>
            </tr>
          <?php else: ?>
            <?php foreach ($log_aktivitas as $log): ?>
              <tr>
                <td><?= esc($log['waktu']) ?></td>
                <td><?= esc($log['aktivitas']) ?></td>
                <td><?= esc($log['username']) ?></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>